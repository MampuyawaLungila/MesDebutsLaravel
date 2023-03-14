<?php

namespace App\repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PostInterface{


    public function create_post(array $input):Model;
    public function update_post(array $input,$id):Model;
    public function delete_post($id):Model;
    public function get_post():Collection|null;
    public function get_post_by_id($id);
    public function get_post_comment($post_id):Collection|null;

}
