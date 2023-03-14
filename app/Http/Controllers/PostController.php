<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

Use App\Models\Comment;
use App\repository\PostInterface;



class PostController extends Controller
{
    private PostInterface $postInterface;


    public function __construct(PostInterface $_postInterface){
        $this->postInterface=$_postInterface;

    }

    public function index (){

        $post = $this->postInterface->get_post();

        return view('home', compact('post'));
    }


    public function create()
    {
        return view('create_post');
    }

// CREATE

    public function store(Request $request)
    {
        $post= new Post;
        $post->titre= $request->title;
        $post->contenu= $request->content;
        $post->save();

        if($post){
            dd('save');
        }

    }
// La Suppression

    public function delete($id)
    {
        $post=Post::where('id', $id)->first();
        //dd($post);
        if($post){
            $post->delete();
        }
        else{
            dd('not found');
        }

        if($post){
            dd('deleted');
        }
    }

    public function edit($id){
        $post=Post::where('id', $id)->first();
        return view('edit_post', compact('post'));
    }

    // Mise à jour

    public function update(Request $request){
        $post=Post::where('id', $request->id)->first();
        //dd($post);

        $post->titre= $request->title;
        $post->contenu= $request->content;
        $post->update();

        return back();
    }

    public function getComment($post_id){
        $comments= $this->postInterface->get_post_comment($post_id);
        return dd($comments);
    }

}
