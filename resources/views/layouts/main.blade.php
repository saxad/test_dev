<!DOCTYPE html>
<html lang="en">


<head>
  <title>Bootstrap Landing Page Website Tutorial</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- scripts -->

  <script src="{{ asset('js/jquery.js') }}" defer></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>



<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light my-nav sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home')}}">
        <img src="{{ asset('images/logo.png') }}" alt="" width="50" height="50">
      </a>


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class=" collapse  navbar-collapse flex-row-reverse " id="navbarSupportedContent">
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home')}}">ACCUEIL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('add')}}">AJOUTER</a>
          </li>


        </ul>

      </div>
    </div>
  </nav>

  @yield('content')


  @yield('script')
</body>

</html>