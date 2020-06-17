@extends('layouts.layout')

@section('content')

<div class="gallery-wrapper">

   <h2 style="margin-left: 1em; width: 100%">
      Album {{ $albumName ?? ''}}
   </h2>
   
   @if (count($photos) > 0)
       
      @foreach ($photos as $photo)

         <div class="photo"><img src="/images/t/{{ $photo['id'] }}.jpg" class="gallery"></div>
         
      @endforeach

   @else

      <p style="margin-left: 1em">Album <strong>{{ $albumName }}</strong> Nie zawiera żadnych zdjęć.</p>

   @endif
    
</div>

@endsection