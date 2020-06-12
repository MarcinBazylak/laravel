<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/img.css">
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

               @yield('content')

            <footer>

               Copyright by Marcin Bazylak 2019. All Rights Reserved.

            </footer>
            
         </div>

      </div>
      
   </div>
   

   {{-- <script>

const target = document.getElementById("target");

document.addEventListener("wheel", function(e){
  // prevent the default scrolling event
  e.preventDefault();

  // scroll the div
  target.scrollBy(e.deltaX, e.deltaY);
});

   </script> --}}
</body>
</html>