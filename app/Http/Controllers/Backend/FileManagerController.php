<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileManagerController extends Controller
{
    private $fileTypes = array(
        "jpg"=>"image",
        "jpeg"=>"image",
        "png"=>"image",
        "svg"=>"image",
        "webp"=>"image",
        "gif"=>"image",
        "mp4"=>"video",
        "mpg"=>"video",
        "mpeg"=>"video",
        "webm"=>"video",
        "ogg"=>"video",
        "avi"=>"video",
        "mov"=>"video",
        "flv"=>"video",
        "swf"=>"video",
        "mkv"=>"video",
        "wmv"=>"video",
        "wma"=>"audio",
        "aac"=>"audio",
        "wav"=>"audio",
        "mp3"=>"audio",
        "zip"=>"archive",
        "rar"=>"archive",
        "7z"=>"archive",
        "doc"=>"document",
        "txt"=>"document",
        "docx"=>"document",
        "pdf"=>"document",
        "csv"=>"document",
        "xml"=>"document",
        "ods"=>"document",
        "xlr"=>"document",
        "xls"=>"document",
        "xlsx"=>"document",
        "glb" => "cad",
        "gltf" => "cad",
        "usdz" => "cad",
        "3dm" => "Rhinoceros",
        "stl" => "Stereolithography"
    );

    private $fileUploadPath = '';

    public function __construct() {
        $this->fileUploadPath = Config::get('constants.file_upload_path');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->has('search') ? $request->search : '';

        $files = Upload::where('file_original_name', 'LIKE' ,'%' . $search . '%')->orderby('id', 'desc')->paginate(16);

        if ($request->ajax() && $request->has('page')) {
            return view('backend.file_manager.files-pagination', ['files' => $files]);
        }

        return view('backend.file_manager.container-modal', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){

            $upload = new Upload;
            $extension = strtolower($request->file('file')->getClientOriginalExtension());

            if(isset($this->fileTypes[$extension])){

                $upload->file_original_name = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);

                $hash = Str::random(40);
                $size = $request->file('file')->getSize();
                $fileName = $hash . '.' . $extension;

                $request->file('file')->move(public_path($this->fileUploadPath), $fileName);

                if($this->fileTypes[$extension] == 'image') {
                    try {
                        $image = Image::make(public_path($this->fileUploadPath) . $fileName);

                        $thumbnailWidth = Config::get('constants.product_thumbnail_size.width');
                        $thumbnailHeight = Config::get('constants.product_thumbnail_size.height');
                        $suffix = Config::get('constants.product_thumbnail_suffix');

                        $image->resize($thumbnailWidth, $thumbnailHeight);

                        $image->save(public_path($this->fileUploadPath) . $hash . $suffix . '.' . $extension, 80);
                        clearstatcache();

                    } catch (\Exception $e) {
                    }
                }

                $upload->extension = $extension;
                $upload->file_name = $hash . '.' . $extension;
                $upload->user_id = Auth::user()->id;
                $upload->type = $this->fileTypes[$extension];
                $upload->file_size = $size;
                $upload->save();
            }
        }

        return true;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
