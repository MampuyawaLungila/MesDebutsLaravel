<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

Use App\Models\Comment;

class PostController extends Controller
{
    public function index (){

        $post = Post::all();

        return view('home', compact('post'));
    }


    public function create()
    {
        return view('create_post');
    }

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
    public function update(Request $request){
        $post=Post::where('id', $request->id)->first();
        //dd($post);

        $post->titre= $request->title;
        $post->contenu= $request->content;
        $post->update();

        return back();
    }

    public function getComment($post_id){
        $comments= Comment::where('post_id', $post_id);
        return dd($comments);
    }

}
