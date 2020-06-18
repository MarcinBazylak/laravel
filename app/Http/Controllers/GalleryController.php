<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    
   public function index()
   {

      $album = Album::where('public', 1)->first();

      if(!empty($album)) {
         $photos = Photo::where('album_id', $album['id'])->get();
         return view('gallery', ['photos' => $photos]);
      } else {
         return view('gallery');
      }

   }

   public function show($id)
   {

      $album = Album::where('id', $id)->where('public', 1)->first();

      if(!empty($album)) {
         $photos = Photo::where('album_id', $id)->get(); 
         return view('gallery', ['photos' => $photos, 'albumId' => $id, 'albumName' => $album['name']]);
      } else {
         return view('gallery');
      }

   }

}
