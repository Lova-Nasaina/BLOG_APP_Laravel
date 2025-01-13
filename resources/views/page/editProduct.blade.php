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
{{--
    @if(session('message'))
        <p class="alert alert-success">
            {{ session('message') }}
        </p>
        @php
            Session::forget('message');
        @endphp

    @else
        <p class="alert alert-danger">
            auccun donnée trouver
        </p>
    @endif --}}

    <form action="/saveModifProduct/{{ $produit->id }}" method="POST" class="form-horizontal">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="">Nom Produit</label>
            <input type="text"  name="product_name" placeholder="Nom produit" class="form-control" value="{{ $produit->product_name }}">
        </div>
        <div class="form-group">
            <label for="">Prix Produit</label>
            <input type="number"  name="product_price" placeholder="Prix produit" class="form-control" value="{{ $produit->product_price }}">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text"  name="description" placeholder="Nom produit" class="form-control" value="{{ $produit->description }}">
        </div>

        <br>
        <input type="submit" value="Modifier Produit" class="btn btn-primary">

    </form>
</body>
</html>
