@extends("layouts.app")
@section("content")

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
   <!--pour le dashboard admin-->
    <div class="container text-center">
  <div class="row align-items-start">
    <div class="col s12">
    <h1>Crud in laravel 10</h1>
    <hr>
    <a href="/create" class="btn btn-primary">Ajouter un post</a>
    <hr>
    <table class="table">
<thead>
    <tr>
        <th>id</th>
        <th>desciption</th>
        <th>image</th>       
        <th>img</th>      
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach ($posts as $post)

    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->desciption}}</td>
        <td>{{$post->image}}</td>
        <img src="{{asset('images/' . $post->image)}}" style="width: 30rem;height:30rem" class="img-product" alt="...">
        <td>
<a href="#" class="btn btn-info">Update</a>
<a href="#" class="btn btn-danger">Delete</a>
        </td>
    </tr>
   
    @endforeach
</tbody>
    </table>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>