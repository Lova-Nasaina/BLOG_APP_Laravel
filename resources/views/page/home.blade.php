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

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="javascript:void(0)">Blog de Vente</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
            </ul>
            <form class="d-flex">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route("compte.profil") }}">
                      {{-- <img src="logo.png" alt="Profil" style="width:40px;" class="rounded-pill"> --}}
                      <img src="{{ asset('images/profiles/' . $user->photo) }}" alt="Profil" style="width: 60px; border:1px solid white;" class="rounded-pill">
                    </a>
                  </div>

              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  @method('POST')
                  <button class="btn btn-primary" type="submit">Logout</button>
                </form>
            </form>
          </div>
        </div>
    </nav>

    <div class="container">
          <a href="{{ URL::to('/createproduct') }}"  class="btn btn-success mt-5" >Crée produit</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Vendeur(euse)</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Photo</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($produits as $item)
                <tr>
                    <td>{{$item->user_name}}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->product_price}}</td>
                    <td><img src="{{ asset('images/profiles/' . $item->photos) }}" alt="Image de profil" width="140" style="border-radius:10%"></td>
              </tr>
            @endforeach



        </tbody>
      </table>
    </div>

    {{-- <a href="{{ URL::to('/service') }}">vers service</a> --}}
</body>
</html>
