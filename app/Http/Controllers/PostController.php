<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function dashboard(){
    $posts = Posts::latest()->get();
   //  $posts = Posts::all();
//     $posts=Posts::all();
    return view('list')->with('posts', $posts);
    //,compact("posts"));
}

//     public function index()
//     {
//         //
//          //On récupère tous les Post
//     //$posts = Posts::latest()->get();
//    // $posts=Posts::all();
//     // On transmet les Post à la vue
//     return view("posts.index", compact("posts"));
//     }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        //
         // On retourne la vue "/resources/views/posts/edit.blade.php"
    return view("posts.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       // $posts=Posts::all();
    // 1. La validation
    //$this->validate($request, [
        $request->validate([
        'description' => 'string|max:255',
        "image" =>  '|image|mimes:jpg,pnp,jpeg,gif,svg|max:2028',
        "photo"=> '|image|mimes:jpg,pnp,jpeg,gif,svg|max:2028',
    ]);
    
    $post = new Posts;
    $file_name = time() .'.'. request()->image->getClientOriginalExtension();
    request()->image->move(public_path('images'), $file_name);
    $post->description = $request->description;
    $post->image = $file_name;
    $post->save();

return redirect()->route('list')->with('success','Product Added successfully');

    // 2. On upload l'image dans "/storage/app/public/posts"
    // $chemin_image = $request->image;

    // 3. On enregistre les informations du Post
    // PostController::create([
    //     "description" => $request->description,
    //     "image" => $chemin_image,
        
    // ]);

    // 4. On retourne vers tous les posts : route("posts.index")
    // return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //    //$posts =Posts::find($id);
    //    $posts=Posts::all();
    //     //Pour afficher un Post enregistré, nous le récupérons à partir de son identifiant puis le transmettons à la vue /resources/views/posts/show.blade.php :
    //     return view("show", compact("posts"));
    // }
    // public function show($id) {
    //     $posts =Posts::find($id);
    //     return view("show", compact("posts"));
    // }
     /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
         $post =Posts::find($id);
        
        //Pour éditer un Post, nous le récupérons à partir de son identifiant puis le transmettons à la vue /resources/views/posts/edit.blade.php
       //return view("posts.edit", compact("post"));
       return view('list')->with('posts', $posts);
    }
   
    public function list(){
        $posts= Posts::all();
        return view('dashboard')->with('posts', $posts);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update_post(Request $request, string $id)
    {
        $posts = Posts::find($request->id);

          // 1. La validation
          $request->validate([
  
            "description" => 'string|max:255',
            "image" =>  '|image|mimes:jpg,pnp,jpeg,gif,svg|max:2028',
          
        ]);
       ;
    // Les règles de validation  "content"
    $rules = [    
        "description" => 'string|max:255',
    ];
    // Si une nouvelle image est envoyée
    if ($request->has("image")) {
        // On ajoute la règle de validation pour "picture"
        $rules["image"] = '|image|mimes:jpg,pnp,jpeg,gif,svg|max:2028';
    }
    $this->validate($request, $rules,);
    $posts->update();
    return redirect(route('list'));


    // 4. On affiche le Post modifié : route("posts.show")
  // return redirect(route('show'));
    }
//pour modifier un post

    // public function update_posts(Request $request){
    //     $request->validate([
  
    //         "description" => 'string|max:255',
    //         "image" =>  '|image|mimes:jpg,pnp,jpeg,gif,svg|max:2028',
          
    //     ]);
    //     $posts = Posts::find($request->id);
    //     $posts->description = $request->description;
    //     $posts->image = $request->image;
        
    //     $posts->update();
  
    //     return redirect(route('posts.index'))->with('status', 'Le post a bien été modifie avec succes.');
  
    //   }

    /**
     * Remove the specified resource from storage.
     */
    //public function delete(Posts $posts)
    //{
        //
          // On supprime l'image existant
   // Asset::delete($post->image);

    // On les informations du $post de la table "posts"
    //$post->delete();

    // Redirection route "posts.index"
    //return redirect(route('posts.index'));
    public function delete_post($id){
        $post =Posts::find($id);
        $post->delete();
        return redirect(route('list'))->with('status', 'Le post a bien été supprime avec succes.');
      }
          
    
}
