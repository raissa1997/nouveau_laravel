<x-app-layout>
<x-slot name="header">
        <h2>
            {{ __('Dashboard for user') }}
        </h2>
    </x-slot>
  <head>
    
 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Album example · Bootstrap v5.3</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  </head>
  <body>
                              
    @if($message = Session::get('success'))
          <!--<div><ul><li>{{ $message }}</li></ul></div>-->
          <script type="text/javascript"> 
          const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
       }
       })

      Toast.fire({
      icon: 'success',
      title: '{{ $message }}'
      })
</script>
        @endif
        <p>
                <a href="{{ route('create') }}" style="width: 8;height:4rem; font-size: 2em;font-weight: bold; margin-bottom:2rem;margin-left:80rem;padding-top:1rem;" class="btn btn-primary" title="Créer un article" >Créer un nouveau post</a>
                </p> 
         
         
                <h1>Tous vos posts sont disponibles ici</h1>
          <div  style="width: 43rem;margin-left:30rem;">
           @if(isset($posts))
           <br>
           <br>
			      @foreach ($posts as $post)
            <img src="{{asset('images/' . $post->image)}}" style="width: 40rem;height:40rem" class="card-img-top" alt="...">
            <div > 
              <p >{{$post->description}}</p>
              <a href="/update_post/{{$post->id}}" class="btn btn-info">Update</a>

              <a href="/delete/{{$post->id}}" class ="btn btn-danger">Delete</a>
            <label for="commentaire" >Ajouter un Commentaire</label><br/>
            <textarea  name="commentaire"></textarea>
            </div>
  
            @endforeach
            </div>
           
          @endif
      
         
         
         
         
         
         
         
         
         
         
         
          <div class="card" style="width: 25rem;margin-left:23px;height:40rem;">
            <img src=""  class="card-img-top" alt="..." style="width:24rem;height:25rem">
            <div class="card-body"> 
              <p class="card-text">jighgfx</p>
              <div >  
                    <a href="" title="Modifier l'article">update</a>
                    <a href="" class ="btn btn-danger">Delete</a>
            </div> 
            <label for="commentaire" >Ajouter un Commentaire</label><br/>
            <textarea  name="commentaire"></textarea>
           
          </div>
            </div>


                 
<script src="https://kit.fontawesome.com/45b8fbd474.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</x-app-layout>