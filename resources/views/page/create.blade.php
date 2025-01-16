<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

{{-- <div class="container">
    <form  method="POST" class="form-horizontal">

        <div class="form-group">
            <label for="">Nom Produit</label>
            <input type="text"  name="product_name" placeholder="Nom produit" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Prix Produit</label>
            <input type="number"  name="product_price" placeholder="Prix produit" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text"  name="description" placeholder="Nom produit" class="form-control">
        </div>
        <input type="submit" value="Ajout Produit" class="btn btn-primary">

    </form>

</div> --}}




<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <h3>Publier un Produit</h3>
                    <p class="mb-0">Remplissez les champs pour partager votre produit</p>
                </div>
                <div class="card-body">
                    @if (session()->has("success"))
                    <div class="alert alert-success">
                        {{ session()->get("success") }}
                    </div>
                    @endif

                    @if (session()->has("error"))
                    <div class="alert alert-danger">
                        {{ session()->get("error") }}
                    </div>
                    @endif

                    <form action="{{ url('/saveproduct') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{-- <input type="hidden" name="user_id" value="{{  }}"> --}}
                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom produit</label>
                            <input type="text" class="form-control" id="name" name="product_name" placeholder="Nom de votre produit" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Prix produit</label>
                            <input type="number" class="form-control" id="email" name="product_price" placeholder="Prix de votre produit" required>
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Description</label>
                            <input type="text" class="form-control" id="password" name="description" placeholder="Description de votre produit" required>
                        </div>


                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Image Produit</label>
                            <input type="file" class="form-control" id="product_image" name="product_image" required>
                        </div>

                        <!-- Bouton d'inscription -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Ajouté</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>Revenir à <a href="{{ url('/home') }}" class="text-primary">Page d'acceuil</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
