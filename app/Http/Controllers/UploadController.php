<?php

namespace App\Http\Controllers;

use App\Models\MyMedia;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $r){
        $media = $r->file('file');
        $newMedia = new MyMedia();
        $newMedia->addMedia($media)->toMediaCollection('uploads');

        return response()->json(['message' => 'File uploaded successfully'], 200);
    }
}
