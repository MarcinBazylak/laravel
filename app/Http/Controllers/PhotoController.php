<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class PhotoController extends Controller
{
      
   public function __construct()
   {
       $this->middleware('auth');
   }

   public function index()
   {

      $photos = Photo::get()->sortByDesc("id");

      return view('admin/photos', ['photos' => $photos]);

   }

   public function store(request $request)
   {
    
      request()->validate([
         'album_id' => 'required|max:3',
         'photo'  => 'array|max:10|required',
         'photo.*' => 'image|mimes:jpg,jpeg'
       ]);

      $images = $request->file('photo');
      $albumId = request('album_id');
      if ($request->hasFile('photo')):
         foreach ($images as $item):

            $photo = new Photo();

            $photo['album_id'] = $albumId;
      
            $photo->save();

            $lastId = $photo->id;

            $item->move(base_path() . '/public/images', $lastId . '.jpg');

            $img = Image::make('images/' . $lastId . '.jpg');

            $img->resize(300, null, function ($constraint) {
               $constraint->aspectRatio();
            });

            $img->save('images/t/' . $lastId . '.jpg');
            
            $img->destroy();

         endforeach;

         return redirect('/photos')->with('mssg', 'Zdjęcia zostały dodane.');

      endif;

   }

   public function destroy($id)
   {

      $photo = Photo::findOrFail($id);

      $photo->delete();

      if(is_file('images/' . $id . '.jpg')) {
         unlink('images/' . $id . '.jpg');
      }

      if(is_file('images/t/' . $id . '.jpg')) {
         unlink('images/t/' . $id . '.jpg');
      }

      return redirect('/photos')->with('mssg', 'Zdjęcie zostało usunięte.');

   }

}