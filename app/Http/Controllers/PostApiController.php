<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{
    // verification des données contenues dans notre base de données

    public function index()
    {
        $post= Post::all();

        return response($post, 200);

    }

    // implementation de la fonction d'insertion ou de la création d'un post

    public function insert (Request $request)
    {
        $postData= $request->validate([
            'titre' => 'required|min:5',
            'contenu' => 'required|min:5'
        ]);

        $post= new Post;

        $post->titre = $postData['titre'];
        $post->contenu = $postData['contenu'];
        $post->save();

        return response(['message' => 'Un post est ajouté avec succès']);

    }

    // suppression ou DELETE d'un post ou occurence des données au travers de son identifiant

    public function delete($id)
    {
        $post= Post::where('id', $id)->first();

        if($post){
            $post->delete();
            return response(['message' => 'le post est supprimé avec succès']);
        }else{
            return response(['message' =>'Ce post a peut-etre déjà supprimé ou n\'existe pas']);
        }
    }

    //Selection ou SELECT d'un post au travers de son identifiant en particulier

    public function show(Post $id)
    {
        return Post::find($id);
    }
}
