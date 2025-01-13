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
    <h1>Detail du produit</h1>
    <hr>
    <p>{{ $produit->product_name }}</p>
    <p>{{ $produit->product_price }}</p>
    <p>{{ $produit->description }}</p>
    <div>
    <a href="/edit/{{ $produit->id }}" class="btn btn-primary mb-3">Edit</a>

    <form action="/delete/{{ $produit->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mb-3">Delete</button>
    </form>
    </div>

</body>
</html>
