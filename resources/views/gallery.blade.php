@extends('layouts.layout')

@section('content')

<div class="gallery-wrapper">

   @if (isset($photos))
   
      @foreach ($photos as $photo)

         <div class="photo"><img src="/images/t/{{ $photo['id'] }}.jpg" class="gallery"></div>
         
      @endforeach

   @endif

</div>

@endsection