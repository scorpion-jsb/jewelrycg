<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\ServicePackageRequest;
use App\Models\ServiceCategorie;
use App\Models\ServicePackage;
use App\Models\ServicePost;
use App\Models\ServicePostCategorie;
use App\Models\ServicePostTag;
use App\Models\ServiceTags;
use App\Models\Upload;
use Auth;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        return view('service.services.list', [
            'services' => ServicePost::with(['categories', 'postauthor'])->where('user_id', $user_id)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function all()
    {
        // dd(ServicePost::with(['thumb', 'categories.category', 'postauthor', 'seller', 'packages'])->orderBy('id', 'DESC')->get());
        return view('service.index', [
            'services' => ServicePost::with(['thumb', 'categories.category', 'postauthor', 'seller', 'packages'])->where('status', 1)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function detail($id)
    {
        $data = ServicePost::with(['thumb', 'categories.category', 'postauthor', 'seller', 'packages', 'tags.tag'])->findOrFail($id);
        $gallery_ids = explode(',', $data->gallery);

        $galleries = [];
        for ($i = 0; $i < count($gallery_ids); $i++) {
            $gallery = Upload::where('id', $gallery_ids[$i])->first();
            if (!$gallery) {
                continue;
            }
            array_push($galleries, $gallery);
        }

        $tag_ids = [];
        for ($i = 0; $i < count($data->tags); $i++) {
            array_push($tag_ids, $data->tags[$i]->id_tag);
        }

        $data->tag_ids = $tag_ids;
        $data->galleries = $galleries;

        return view('service.detail', [
            'service' => $data,
        ]);
    }

    public function trash()
    {
        return view('service.services.trash', [
            'services' => ServicePost::onlyTrashed()->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function get()
    {
        $user_id = Auth::id();
        return datatables()->of(ServicePost::where('user_id', $user_id)->get())
            ->addIndexColumn()
            ->editColumn('cover_image', function ($row) {
                return "<img src='" . $row->cover_image . "'>";
            })
            ->addColumn('action', function ($row) {

                $btn = '<a href="' . route('seller.services.edit', $row->id) . '"  class="edit btn btn-info btn-sm">Edit</a>';
                $btn = $btn . '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
            })
            ->rawColumns(['action', 'cover_image'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $step
     * @return \Illuminate\Http\Response
     */
    public function create($step = 0, $post_id = -1)
    {
        $data = null;
        if ($post_id != -1) {
            $data = ServicePost::with(['thumb', 'tags', 'categories', 'packages'])->findOrFail($post_id);
            $gallery_ids = explode(',', $data->gallery);

            $galleries = [];
            for ($i = 0; $i < count($gallery_ids); $i++) {
                array_push($galleries, Upload::where('id', $gallery_ids[$i])->first());
            }

            $tag_ids = [];
            for ($i = 0; $i < count($data->tags); $i++) {
                array_push($tag_ids, $data->tags[$i]->id_tag);
            }

            $data->tag_ids = $tag_ids;
            $data->galleries = $galleries;
        }

        // $step = 1;
        return view('service.services.create', [
            'categories' => ServiceCategorie::all(),
            'tags' => ServiceTags::all(),
            'step' => $step,
            'post_id' => $post_id,
            'data' => $data,
        ]);
    }

    private function generateSlug($string)
    {
        return str_replace(' ', '-', $string);
    }

    private function registerNewTag($tag)
    {
        $last = ServiceTags::where('name', $tag)->first();

        if ($last) {
            return $last->id;
        }

        $servicetag = ServiceTags::create([
            'name' => $tag,
            'slug' => $this->slugify($tag),
        ]);
        return $servicetag->id;
    }

    public function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $slug_count = ServicePost::whereName($request->name)->count();
        $step = $request->step + 1;
        $post_id = $request->service_id;
        $suffix = ($slug_count == 0) ? '' : '-' . (string) $slug_count + 1;
        $tags = (array) $request->input('tags');
        $categories = (array) $request->input('categories');

        $data = $request->input();
        $data['user_id'] = Auth::id();

        if (ServicePost::where('slug', $this->slugify($request->name))->count()) {
            $data['slug'] = $this->slugify($request->name) . "-1";
        } else {
            $data['slug'] = $this->slugify($request->name);
        }

        $service = ServicePost::firstOrNew(['id' => $post_id]);
        $service->save();
        $service->update($data);

        $post_id = $service->id;

        ServicePostTag::where('id_service', $post_id)->delete();
        ServicePostCategorie::where('id_post', $post_id)->delete();

        foreach ($tags as $tag) {
            $id_tag = (!is_numeric($tag)) ? $this->registerNewTag($tag) : $tag;
            ServicePostTag::create([
                'id_tag' => $id_tag,
                'id_service' => $post_id,
            ]);

        }

        foreach ($categories as $categorie) {
            ServicePostCategorie::create([
                'id_category' => $categorie,
                'id_post' => $post_id,
            ]);
        }

        return redirect()->route('seller.services.create', ['step' => $step, 'post_id' => $post_id]);
    }

    public function gallery(GalleryRequest $request)
    {
        $step = $request->step + 1;
        $post_id = $request->service_id;
        $thumb = $request->thumb;
        $gallery = $request->gallery;

        ServicePost::where('id', $post_id)->update(['thumbnail' => $thumb, 'gallery' => $gallery]);

        return redirect()->route('seller.services.create', ['step' => $step, 'post_id' => $post_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function package(ServicePackageRequest $request)
    {
        $servicepackage = new ServicePackage();
        $data = $request->input();
        $step = $data['step'] + 1;
        $post_id = $data['service_id'];
        $names = $request->input('name');

        ServicePackage::where('service_id', $post_id)->delete();
        for ($i = 0; $i < count($names); $i++) {
            if ($names[$i]) {
                $temp['name'] = $data['name'][$i];
                $temp['service_id'] = $data['service_id'];
                $temp['description'] = $data['description'][$i];
                $temp['price'] = $data['price'][$i];
                $temp['revisions'] = $data['revisions'][$i];
                $temp['delivery_time'] = $data['delivery_time'][$i];
                $servicepackage->create($temp);
            }
        }

        return redirect()->route('seller.services.create', ['step' => $step, 'post_id' => $post_id]);
        // return redirect()->route('seller.services.list');
    }

    public function review(Request $request)
    {
        $step = $request->step + 1;
        $post_id = $request->service_id;

        return redirect()->route('seller.services.list');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('seller.services.create', ['step' => 0, 'post_id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $id)
    {
        $slug_count = ServicePost::whereName($request->name)->count();
        $suffix = ($slug_count == 0) ? '' : '-' . (string) $slug_count + 1;

        $tags = (array) $request->input('tags');
        $categories = (array) $request->input('categories');

        $service = ServicePost::findOrFail($id);
        $data = $request->input();
        $data['user_id'] = Auth::id();

        $slug = $request->slug;

        if ($slug == '') {
            $slug = $request->name;
        }

        if (ServicePost::where('id', '!=', $id)->where('slug', $this->slugify($slug))->count()) {
            $data['slug'] = $this->slugify($slug) . "-1";
        } else {
            $data['slug'] = $this->slugify($slug);
        }

        $service->update($data);

        ServicePostTag::where('id_post', $service->id)->delete();
        ServicePostCategorie::where('id_post', $service->id)->delete();

        foreach ($tags as $tag) {
            $id_tag = (!is_numeric($tag)) ? $this->registerNewTag($tag) : $tag;
            ServicePostTag::create([
                'id_tag' => $id_tag,
                'id_post' => $service->id,
            ]);
        }

        foreach ($categories as $categorie) {
            ServicePostCategorie::create([
                'id_category' => $categorie,
                'id_post' => $service->id,
            ]);
        }
        return redirect()->route('seller.services.edit', $service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServicePost::whereId($id)->delete();
        return redirect()->route('seller.services.list');

    }

    public function recover($id)
    {
        ServicePost::withTrashed()->find($id)->restore();
        return redirect()->route('seller.services.trash');
    }
}