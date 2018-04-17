<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UploadImage\ImageRepository;
use App\Models\ImageUpload;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    protected $image;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->image = $imageRepository;
    }
    public function getUpload()
    {
        return view('pages.upload');
    }
    public function getUpload3()
    {
        return view('pages.upload3');
    }
    public function postUpload()
    {
        $photo = Input::all();
        $response = $this->image->upload($photo);
        return $response;
    }
    public function deleteUpload()
    {
        $filename = Input::get('id');
        if(!$filename)
        {
            return 0;
        }
        $response = $this->image->delete( $filename );
        return $response;
    }
    /**
     * Part 2 - Display already uploaded images in Dropzone
     */
    public function getServerImagesPage()
    {
        return view('pages.upload-2');
    }
    public function getServerImages()
    {
        $images = ImageUpload::get(['original_name', 'filename']);
        $imageAnswer = [];
        foreach ($images as $image) {
            $imageAnswer[] = [
                'original' => $image->original_name,
                'server' => $image->filename,
                'size' => File::size(public_path('images/full_size/' . $image->filename))
            ];
        }
        return response()->json([
            'images' => $imageAnswer
        ]);
    }
}