@extends('layouts.layout')

@section('content')

<div class="gallery-wrapper">

   <h2 style="margin-left: 1em; width: 100%">
      {{ $albumName ?? ''}}
   </h2>
   
   @if (!empty($photos) && count($photos) > 0)
       
      @foreach ($photos as $photo)

         <div class="photo">
            <a href="/images/{{ $photo['id'] }}.jpg" data-lightbox="gallery">
               <img src="/images/t/{{ $photo['id'] }}.jpg" class="gallery">
            </a>
         </div>
         
      @endforeach

   @else

      <p style="margin-left: 1em">Album <strong>{{ $albumName ?? ''}}</strong> nie zawiera żadnych zdjęć lub nie są one publiczne.</p>

   @endif
    
</div>

@endsection