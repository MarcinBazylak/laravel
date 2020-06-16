<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="/css/style.css">
   <link rel="stylesheet" href="/css/img.css">
   <link rel="stylesheet" href="/css/form.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Marcin Bazylak Galeria</title>
</head>

<body>

   <div class="container">
      <img src="img/niko.jpg" alt="Nikodem" class="top-img">

      <div class="wrapper">

         <div class="grid">

            <header>

               <h1>MARCIN BAZYLAK - GALERIA</h1>

            </header>

            <aside>

               <a href="/">
                  <button class="title">Strona Główna</button>
               </a>

               @foreach ($buttons as $button)
                  
                     @if (isset($albumId) && $albumId == $button['id'])
                        <button class="titleSelected">{{ $button['name'] }}</button>
                     @else
                        <a href="/gallery/{{ $button['id'] }}">
                           <button class="title">{{ $button['name'] }}</button>
                        </a>
                     @endif
                     
               @endforeach

               @if (Auth::check())

               <a href="/albums">
                  <button class="title">Albumy</button>
               </a>

               <a href="/photos">
                  <button class="title">Zdjęcia</button>
               </a>

               <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                  <button class="title" style="color: orangered">Wyloguj</button>
               </a>

               @endif

            </aside>

            <main>

               @yield('content')

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
               </form>

            </main>

            <footer>

               Copyright by Marcin Bazylak 2019. All Rights Reserved.

            </footer>

         </div>

      </div>

   </div>
</body>

</html>