<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard for user') }}
        </h2>
    </x-slot>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<main class="container">
<section>
	<h1>Editer un post</h1>

	<!-- Si nous avons un Post $post -->
	@if (isset($post))

	<!-- Le formulaire est géré par la route "posts.update" -->
	<form method="POST" action="{{ route('edit/{id}', $post->id) }}" enctype="multipart/form-data" >
   

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')
       
      
	@else

	<!-- Le formulaire est géré par la route "posts.store" -->
	<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" >

	@endif

		<!-- Le token CSRF -->
		@csrf
		
	

		<!-- S'il y a une image $post->picture, on l'affiche -->
		@if(isset($post->image))
		<p>
			<span>Image actuelle</span><br/>
            
			<img src="" alt="image de couverture actuelle" style="max-height: 200px;" onchange="showFil(event)">
		</p>
		@endif

		<p>
			
			
            <label for="image">Add Image</label><br>
                        <img src="" alt="" class="img-product" id="file-preview"/>
                        <input type="file" name="image" accept="image/*"  onchange="showFile(event)">
			<!-- Le message d'erreur pour "picture" -->
			
		</p>
		<p>
			<label for="description" >Description</label><br/>

			<!-- S'il y a un $post->content, on complète la valeur du textarea -->
			<textarea name="description" id="description"  rows="10" cols="50" placeholder="La description du post" >{{ isset($post->description) ? $post->description : old('description') }}</textarea>
            
			<!-- Le message d'erreur pour "content" -->
			
		</p>

		<input type="submit" class="btn btn-info" name="valider" value="Valider" >

	</form>
    </section>
</main>
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
</x-app-layout>