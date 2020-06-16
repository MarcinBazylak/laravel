@extends('layouts.layout')

@section('content')

<div class="wrap">

      <h2>Zmień nazwę albumu {{ $albumName }}</h2>
      <p class="alert">{{ session('mssg') }}</p>
      <div class="form-block-left">

         <form method="POST" action="/albums/edit/{{ $albumId }}">
            @csrf

            <div class="form-part">
               <input type="text" placeholder="{{ $albumName }}" class="form-control @error('albumName') is-invalid @enderror" name="name" required autocomplete="off" autofocus>
               @error('name')
               <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>

            <div class="form-part">
               <button type="submit" class="btn">
                  Zapisz
               </button>
            </div>

         </form>
      </div>

      @foreach ($albums as $album)

         {{ $album['name'] }} <br>
         <a href="/albums/edit/{{ $album['id'] }}">edytuj</a> | <a href="/albums/remove/{{ $album['id'] }}">usuń</a><br><br>
         
      @endforeach

</div>

@endsection