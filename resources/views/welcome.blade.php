<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="CSS1/custom.css">

    <title>Employee</title>

  </head>

  <body>

    <video loop id="my-video" src="Media/The_Line_Network_01.mp4"></video>

<div class="container">

  <div class="row">

    <div class="col-sm-12 col-xs-12 col-lg-12 col-xl-12 col-md-12">

      <div class="content">

        <img src="images/logo.png" class="image">

        <h1>WELCOME TO EMPLOYEE MANAGEMENT</h1>

        @if (Route::has('login'))

                <div class="top-right links">

                    @auth

                        <a href="{{ url('/admin') }}">

                        <button id="myBtn" class="glow-on-hover">Admin</button>

                        </a>

                    @else

                        <a href="{{ route('login') }}">

                        <button id="myBtn" class="glow-on-hover">LOGIN</button>

                        </a>

                        @if (Route::has('register'))

                            <!-- <a href="{{ route('register') }}">Register</a> -->

                        @endif

                    @endauth

                </div>

            @endif

      </div>

    </div>

  </div>

</div>

    <script>

      const myVideo = document.getElementById('my-video');

  

  // Not all browsers return promise from .play().

  const playPromise = myVideo.play() || Promise.reject('');

  playPromise.then(() => {

    // Video could be autoplayed, do nothing.

  }).catch(err => {

    // Video couldn't be autoplayed because of autoplay policy. Mute it and play.

    myVideo.muted = true;

    myVideo.play();

  });

    </script>

  

    <script>

      var promise = document.querySelector('video').play();

  

  if (promise !== undefined) {

    promise.then(_ => {

      // Autoplay started!

    }).catch(error => {

      // Autoplay was prevented.

      // Show a "Play" button so that user can start playback.

    });

  }

    </script>

 

 

  </body>

</html>