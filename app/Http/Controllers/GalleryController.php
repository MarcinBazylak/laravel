<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;

class GalleryController extends Controller
{
    
   public function index()
   {

      $photos = Photo::get()->sortByDesc("id");

      return view('gallery', ['photos' => $photos]);

   }

   public function show($id)
   {

      $photos = Photo::where('album_id', $id)->get();

      $albumName = Album::findOrFail($id)->name;

      return view('gallery', ['photos' => $photos, 'albumId' => $id, 'albumName' => $albumName]);

   }

}
