@php
    use App\Photo;
@endphp

@extends('layouts.layout')

@section('content')

<div class="wrap">

   <h2>Albumy</h2>
   <p class="alert">{{ session('mssg') }}</p>

   <div class="form-block-left">

      <form method="POST" action="/albums">
         @csrf

         <div class="form-part">
            <input placeholder="Nazwa albumu" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>

         <div class="form-part">
            <input type="checkbox" name="public" value="1" checked> publiczny
         </div>

         <div class="form-part">
            <button type="submit" class="btn">
               Dodaj nowy album
            </button>
         </div>

      </form>
   </div>

   @foreach ($albums as $album)

      <div class="albumList">

         @php
            $count = Photo::where('album_id', '=', $album['id'])->count();
         @endphp

         {{ $album['name'] }} [{{ $count }}] 
         @if ($album['public'] === 1)
             publiczny
         @endif
         
         <br>
         <a href="/albums/edit/{{ $album['id'] }}">edytuj</a>

         @if ($count === 0)
               | <a href="/albums/remove/{{ $album['id'] }}">usuń</a>
         @endif

      </div>
      
   @endforeach

</div>

@endsection