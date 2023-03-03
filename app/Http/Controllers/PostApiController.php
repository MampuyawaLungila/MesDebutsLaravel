<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{

    public function index()
    {
        $post= Post::all();

        return response($post, 200);

    }


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
}
