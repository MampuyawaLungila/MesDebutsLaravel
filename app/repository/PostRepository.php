<?php

namespace App\repository;

use App\Models\Comment;
use App\Models\Post;

class PostRepository implements PostInterface{


	/**
	 * @param array $input
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function create_post(array $input): \Illuminate\Database\Eloquent\Model {
        $model=Post::create($input);
        return $model;
	}

	/**
	 *
	 * @param array $input
	 * @param mixed $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function update_post(array $input, $id): \Illuminate\Database\Eloquent\Model {
        $post=$this->get_post_by_id($id);
        foreach ( $input as $property => $value )
        $post->$property = $value;
        $post->update();
        return $post;
	}

	/**
	 *
	 * @param mixed $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function delete_post($id): \Illuminate\Database\Eloquent\Model {
        $post=$this->get_post_by_id($id);
        $post->delete();
        return $post;
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function get_post(): \Illuminate\Support\Collection {
        $post=Post::all();
        return $post;
	}

	/**
	 *
	 * @param mixed $post_id
	 * @return \Illuminate\Support\Collection
	 */
	public function get_post_comment($post_id): \Illuminate\Support\Collection{
        $comment= Comment::where('post_id', $post_id)->get();
        return $comment;
    }
	/**
	 * @param mixed $id
	 * @return mixed
	 */
	public function get_post_by_id($id) {
        $post=Post::find($id)->first();
        return $post;
	}
}
