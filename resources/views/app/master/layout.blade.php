
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Super Gestão · {{$title}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/pricing/">
    <link rel="stylesheet" href="{{asset('app/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/styles.css')}}">


    <!-- Bootstrap core CSS -->
{{-- <link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
{{-- <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json"> --}}
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    {{-- <link href="pricing.css" rel="stylesheet"> --}}
  </head>
  <body>

<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
        <span class="fs-4">Super Gestão - App</span>
      </a>

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('app.home')}}">Home</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('app.cliente.index')}}">Cliente</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('app.fornecedor.index')}}">Fornecedor</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('app.produto.index')}}">Produto</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('app.pedido.index')}}">Pedido</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{route('app.sair')}}">Sair</a>
        {{-- <a class="py-2 text-dark text-decoration-none" href="route('site.index')">Pricing</a> --}}
      </nav>
    </div>

  </header>

  <main>
    <div class="container">
        @yield('content')
    </div>

  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1cmu76UKMpNDJ4MUfDyzYkUZWBFablVZs3A&usqp=CAU" alt="" width="24" height="19">
        <small class="d-block mb-3 text-muted">&copy; 2017–2021</small>
      </div>
      <div class="col-6 col-md">
        <h5>Funções</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Funcão</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Função futura</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Recursos</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Recurso</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Nome Recurso</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Sobre</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Time</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Termos</a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>


    <script src="{{asset('app/js/jquery.js')}}"></script>
    <script src="{{asset('app/js/bootstrap.js')}}"></script>
    <script src="{{asset('app/js/script.js')}}"></script>
  </body>
</html>
