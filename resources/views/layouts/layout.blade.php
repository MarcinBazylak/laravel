<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="/css/style.css">
   <link rel="stylesheet" href="/css/img.css">
   <link rel="stylesheet" href="/css/form.css">
   <link rel="stylesheet" href="/css/menu.css">
   <link rel="stylesheet" href="/css/lbx.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Marcin Bazylak Galeria</title>
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="/js/lightbox/dist/js/lightbox.js"></script>
</head>

<body>

   <div class="container">
      <img src="/img/niko.jpg" alt="Nikodem" class="top-img">

      <div class="wrapper">

         <div class="grid">

            <header>

               <h1>MARCIN BAZYLAK - GALERIA</h1>

            </header>

            <aside>

               <nav>

                  <label class="navigation-toggle" for="input-toggle">
                     <span></span>
                     <span></span>
                     <span></span>
                  </label>
                  <input type="checkbox" id="input-toggle">
                  
                  <ul>

                     @foreach ($buttons as $button)
                        
                           @if (isset($albumId) && $albumId == $button['id'])
                              <li>
                                 <a class="menuSelected" href="/gallery/{{ $button['id'] }}">
                                    {{ $button['name'] }}
                                 </a>
                              </li>
                           @else
                              <li>
                                 <a class="menu" href="/gallery/{{ $button['id'] }}">
                                    {{ $button['name'] }}
                                 </a>
                              </li>
                           @endif
                           
                     @endforeach

                     @if (Auth::check())
                        <li>
                           <a class="menu" href="/">
                              Strona Główna
                           </a>
                        </li>

                        <li>
                           <a class="menu" href="/albums">
                              Albumy
                           </a>
                        </li>

                        <li>
                           <a class="menu" href="/photos">
                              Zdjęcia
                           </a>
                        </li>

                        <li>
                           <a class="menu" style="color: orangered" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                              Wyloguj
                           </a>
                        </li>

                     @endif

                  </ul>

               </nav>

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