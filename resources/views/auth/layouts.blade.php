<!DOCTYPE html>
<html>

<head>
    <title>Gestion pièce de rechange Accostage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo on the left -->
        <img src="{{ asset('images/logo.png')}}" alt="Logo" style="width: 100px; margin-top:5px; height: auto;">

        <!-- Title in the center -->
        <h1 style="flex: 1; text-align: center; margin: 0;">Gestion pièce de rechange Accostage</h1>

        <!-- Navigation items on the right -->
        <div class="d-flex align-items-center">
            <!-- Hamburger button for mobile view -->
            <button id="menuButton" class="navbar-toggler d-lg-none" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible menu for larger screens -->
            <div class="collapse navbar-collapse d-lg-flex" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Déconnexion</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        @yield('content')
    </div>
    <script>
        document.getElementById('menuButton').addEventListener('click', function() {
            var navbarNav = document.getElementById('navbarNav');
            navbarNav.classList.toggle('show');
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer class="bg-dark text-white" style="text-align: center; margin-top: 10px; margin-bottom: 0px;">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h5>Gestion pièce de rechange Accostage</h5>
                <p>© 2024 Renault group</p>
            </div>
        
        </div>
    </div>
</footer>

</html>