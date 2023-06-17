
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
	

	<img src="{{ asset('images/'.$post->image) }}" alt="Image de couverture" style="max-width: 300px;">

	<div>{{ $post->description }}</div>

	<p><a href="{{ route('dashboard') }}" title="Retourner aux articles" >Retourner aux posts</a></p>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    //pour ajouter la photo au niveau du formulaire dans le input file
function showFile(event){
var input = event.target;
var reader = new FileReader();
reader.onload = function(){
    var dataURL = reader.result;
    var output = document.getElementById('file-preview');
    output.src= dataURL;

};
reader.readAsDataURL(input.files[0]);

}

</script>