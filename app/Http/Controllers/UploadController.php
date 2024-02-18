<?php

namespace App\Http\Controllers;

use App\Models\Medias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadController extends Controller
{
    public $allM;
    public function store(){
        $userId = Auth::id();
        $allM = $media = Medias::create([
            "user_id" => $userId
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function newsLetterEditor(){
        $mediasInstance = new Medias();
    
        $mediaItems = $mediasInstance->getMedia('image');
        dd($mediaItems);
        
        return view("newsLetterEditor", ['mediaItems' => $mediaItems]);
    }
    
}
