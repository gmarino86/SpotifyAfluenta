<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spotify Afluenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="<?= url('/') ?>">Spotify Afluenta</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="my-4 text-white">Buscador de artistas</h1>
        <form class="d-flex mt-4" role="search" method="get" action="/album">
            @csrf
            <input class="form-control me-2" name="artista" type="search" placeholder="Escriba el nombre del artista" aria-label="Search" required>
            <button class="btn btn-borrow" type="submit">Consultar</button>
        </form>
        
        @yield('main')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
    <script>
      window.onload = () => {
        const grid = document.querySelector('.grid')
        const masonry = new Masonry(grid)
      }
    </script>
</body>

</html>