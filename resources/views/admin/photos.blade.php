@php
use App\Album;
@endphp
@extends('layouts.layout')

@section('content')

<div class="gallery-wrapper">

   <div>
      <h2>Zdjęcia</h2>
      <p class="alert">{{ session('mssg') }}</p>
   </div>
   

   <div class="form-block-left">

      <form method="POST" action="/photos" enctype="multipart/form-data">
         @csrf
   
         <div class="form-part">
            <label for="photo">Dodaj nowe zdjęcia (max 10szt.)</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror @error('photo.*') is-invalid @enderror" name="photo[]" required autocomplete="off" multiple>
            
            @error('photo.*')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
            
            @error('photo')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
   
         </div>
   
         <div class="form-part">
            <select class="form-control @error('album_id') is-invalid @enderror" name="album_id" required autocomplete="off">
            <option disabled selected>Wybierz Album</option>
            @php
               $albums = Album::get();
            @endphp
   
            @foreach($albums as $album)
   
               <option value="{{ $album['id'] }}">{{ $album['name'] }}</option>
   
            @endforeach        
   
            </select>
            @error('album_id')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
   
         <div class="form-part">
            <button type="submit" class="btn">
               Zapisz zdjęcia
            </button>
         </div>
   
      </form>
   </div>

   @if (isset($photos))
   
      @foreach ($photos as $photo)

         <div class="photo">
            <img src="/images/t/{{ $photo['id'] }}.jpg" class="gallery"><br>
            <a href="photos/remove/{{ $photo['id'] }}">usuń</a>
         </div>
         
      @endforeach

   @endif

</div>


@endsection