<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\repository\PostInterface;

class PostApiController extends Controller
{
    private PostInterface $postInterface;


    public function __construct(PostInterface $_postInterface){
        $this->postInterface=$_postInterface;

    }
    // verification des données contenues dans notre base de données

    public function index()
    {
        $post= $this->postInterface->get_post();

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

        return response(['message' => 'Un post est ajouté avec succès'], 200);

    }

    // suppression ou DELETE d'un post ou occurence des données au travers de son identifiant

    public function delete($id)
    {
        $post= Post::where('id', $id)->first();

        if($post){
            $post->delete();
            return response(['message' => 'le post est supprimé avec succès'], 200);
        }else{
            return response(['message' =>'Ce post a peut-etre déjà supprimé ou n\'existe pas'], 403);
        }
    }

    //Selection ou SELECT d'un post au travers de son identifiant en particulier

    public function show($id)
    {
        $post= $this->postInterface->get_post_by_id($id);
        return response($post, 200);
    }

    public function getComment($post_id)
    {
        $comment=  $this->postInterface->get_post_comment($post_id);
        return response($comment, 200);
    }

    //Mise à jour d'une occurence au travers de son ID

    public function edit(request $request, $id)
    {
        $postData= $request->validate([
            'titre' => 'required|min:5',
            'contenu' => 'required|min:5'
        ]);

        $post= Post::where('id', $id)->first();

        if($post){
            $post->titre = $postData['titre'];
            $post->contenu = $postData['contenu'];

            $post->update();

            return response(['Messsage' => 'le Post a été modifié avec succès'], 200);
        }
        else{
            return response(['Message' => 'l\'enregistrement n\'existe pas']);
        }
    }
}
