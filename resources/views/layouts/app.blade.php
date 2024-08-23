<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de Colocation</title>
    <!-- Intégration de Bootstrap via un CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <a class="navbar-brand" href="{{ route('home') }}">Colocation</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('offres.index') }}">Annonces</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reservations.index') }}">Mes Réservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('messages.index') }}">Mes Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se Déconnecter</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Se Connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Contenu principal -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Intégration de Bootstrap JS (optionnel, pour fonctionnalités avancées) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
