<?php

namespace App\Http\Controllers;

use App\Models\Medias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadController extends Controller
{
    public function upload(Request $r){
        // $user = auth()->user();
        // $media = $r->file('file');
        $newMedia = new MyMedia();  
        // dd($newMedia);
        $newMedia->addMediaFromRequest('file')->toMediaCollection();
        // $newMedia->addMedia($media)->toMediaCollection('uploads');
    }

    public function store()
    {
        $userId = Auth::id();
        $media = Medias::create([
            "user_id" => $userId
        ]);


        // Add the uploaded image to the media collection
        $media->addMediaFromRequest('file')->toMediaCollection();
        // Handle success scenario
        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }
}
