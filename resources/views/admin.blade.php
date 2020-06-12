@extends('layouts.layout')

@section('content')
<aside>
   <a href="/">
      <button class="title">Home</button>
   </a>
   <a href="/admin/albums">
      <button class="title">Albumy</button>
   </a>
   <a href="/admin/photos">
      <button class="title">Zdjęcia</button>
   </a>
   <a href="/admin/addPhoto">
      <button class="title">Dodaj zdjęcie</button>
   </a>
   <a href="/logout">
      <button class="title" style="color: orangered">Wyloguj</button>
   </a>
</aside>

<main>

ADMINISTRACJA

</main>
@endsection