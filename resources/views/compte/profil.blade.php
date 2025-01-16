<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>


    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="javascript:void(0)">Profil</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            </ul>
            <form class="d-flex">

            <a class="btn btn-primary" href="{{route("home")}}">
                Acceuil
            </a>
            </form>
          </div>
        </div>
      </nav>

    <div class="container mt-4">
        <div class="row">

            <div class="col-md-3">
                <div class="profile-card">
                    <img src="{{ asset('images/profiles/' . $user->photo) }}" alt="Photo de Profil" class="profile-img">
                    {{-- <img src="" alt="Image de profil" width="180" style="border-radius:10%"> --}}
                    <h4>{{ $user->name }}</h4>
                    <p>Email: {{ $user->email }}</p>
                    <p>Membre depuis: {{$user->created_at}}</p>
                    <button class="btn btn-primary btn-sm">Modifier Profil</button>
                </div>
            </div>

            <!-- Colonne Publications (Droite) -->
            <div class="col-md-9">
                <h3 class="mb-3">Publications</h3>

                <div class="post-card">
                    <h5>Post 1</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
                    <small class="text-muted">Publié le 15 Janvier 2024</small>
                </div>

                <div class="post-card">
                    <h5>Post 2</h5>
                    <p>Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                    <small class="text-muted">Publié le 10 Janvier 2024</small>
                </div>

                <div class="post-card">
                    <h5>Post 3</h5>
                    <p>Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
                    <small class="text-muted">Publié le 5 Janvier 2024</small>
                </div>
            </div>
        </div>
    </div>










    <a href="{{ URL::to('/service') }}">vers service</a>
    <a href="{{ URL::to('/createproduct') }}">Crée produit</a>



    <script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>
