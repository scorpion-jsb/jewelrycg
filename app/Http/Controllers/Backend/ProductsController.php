<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Models\ProductsCategorie;
use App\Models\ProductTag;
use App\Models\Upload;
use App\Models\ProductTagsRelationship;
use App\Http\Controllers\Backend\UploadController;




class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.list', [
            'products' => Product::orderBy('id', 'DESC')->get()
        ]);
    }

    public function get()
    {
        return datatables()->of(Product::query())
        ->addIndexColumn()
        ->addColumn('action', function($row){

               $btn = '<a href="'.route('products.show', $row->id).'" target="_blank" class="edit btn btn-info btn-sm">View</a>';
               $btn = $btn.'<a href="'.route('backend.products.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
               $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';

                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create', [
            'categories' => ProductsCategorie::all(),
            'tags' => ProductTag::all()
        ]);
    }

    private function generateSlug($string)
    {
        return str_replace(' ', '-', $string);
    }

    private function registerNewTag($tag)
    {
        $blogtag = ProductTag::create([
            'name' => $tag,
            'slug' => $this->generateSlug($tag),
        ]);
        return $blogtag->id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        $tags = (array)$req->input('tags');
        $data = $req->all();
        $data['price'] = Product::stringPriceToCents($req->price);
        $data['is_digital'] = $req->is_digital ? 1 : 0;
        $data['is_virual'] = $req->is_virual ? 1 : 0;
        $data['is_backorder'] = $req->is_backorder ? 1 : 0;
        $data['is_madetoorder'] = $req->is_madetoorder ? 1 : 0;
        $data['status'] = ($req->status & $req->status == 1) ? 1 : 0;
     
            $data['slug'] = str_replace(" ","-", strtolower($req->name));
        
        
        $product = Product::create($data);
        $id_product = $product->id;
        
        foreach( $tags as $tag )
        {
            $id_tag = (!is_numeric($tag)) ? $this->registerNewTag($tag) : $tag;
            ProductTagsRelationship::create([
                'id_tag' => $id_tag,
                'id_product' => $id_product,
             ]);

        }
        return redirect()->route('backend.products.edit', $product->id);
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
        $product = Product::whereId($id)->with('tags')->firstOrFail();
        $product->setPriceToFloat();
        return view('backend.products.edit', [
            'product' => $product,
            'categories' => ProductsCategorie::all(),
            'tags' => ProductTag::all(),
            'uploads' => Upload::whereIn('id', explode(',',$product->product_images))->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $req, $product)
    {
        $counter = Product::where('slug', $req->slug)->count();
        $sep = ($counter==0) ? '' : '-'.$counter+1;
        $tags = (array)$req->input('tags');
        $data = $req->all();
        $data['price'] = Product::stringPriceToCents($req->price);
        $data['is_digital'] = ($req->is_digital & $req->is_digital == 1)? 1 : 0;
        $data['is_virual'] = ($req->is_virual & $req->is_virual == 1) ? 1 : 0;
        $data['is_backorder'] = ($req->is_backorder & $req->is_backorder == 1) ? 1 : 0;
        $data['is_madetoorder'] = ($req->is_madetoorder & $req->is_madetoorder == 1) ? 1 : 0;
        $data['status'] = ($req->status & $req->status == 1) ? 1 : 0;
        if($req->slug == "")
        {
            $data['slug'] = str_replace(" ","-", strtolower($req->name)).$sep;
        }
        $product = Product::findOrFail($product);
        $product->update($data);
        $product->replaceImagesIfExist($req->images);
        ProductTagsRelationship::where('id_product', $product->id)->delete();
        foreach( $tags as $tag )
        {
            $id_tag = (!is_numeric($tag)) ? $this->registerNewTag($tag) : $tag;
            ProductTagsRelationship::create([
                'id_tag' => $id_tag,
                'id_product' => $product->id
             ]);

        }
        cache()->forget('todays-deals');

        return redirect()->route('backend.products.edit', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('backend.products.list');
    }
}
