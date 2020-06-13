<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
   
   public function __construct()
   {
       $this->middleware('auth');
   }

   public function index()
   {

      $albums = Album::get();

      //$count = User::where('votes', '>', 100)->count();

      return view('admin/albums', ['albums' => $albums]);
   }


   public function store()
   {
    
      request()->validate([
        'name' => 'string|required|unique:albums|max:30'
      ]);

      $album = new Album();

      $album->name = request('name');

      $album->save();

      return redirect('/albums')->with('mssg', 'Album ' .  $album->name  . ' został dodany.');

   }

   public function destroy($id)
   {

      $album = Album::findOrFail($id);

      $album->delete();

      return redirect('/albums')->with('mssg', 'Album ' .$album->name . ' został usunięty.');

   }

   public function edit($id)
   {

      $album = Album::findOrFail($id);

      $albums = Album::get();

      return view('admin/editAlbum', ['albumId' => $id, 'albumName' => $album->name, 'albums' => $albums]);

   }

   public function amend($id)
   {
    
      request()->validate([
        'name' => 'string|required|unique:albums|max:30'
      ]);

      $album = Album::findOrFail($id);

      $oldName = $album->name;

      $newName = request('name');

      $album->name = $newName;

      $album->save();

      return redirect('/albums')->with('mssg', 'Nazwa albumu ' .  $oldName  . ' została zmieniona na ' . $newName . '.');

   }

}