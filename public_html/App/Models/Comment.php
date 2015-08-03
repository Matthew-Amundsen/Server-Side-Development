<?php

namespace App\Models;

class Comment extends DatabaseModel
{

    protected static $columns = ['id', 'user_id', 'movie_id', 'created', 'comment'];

    protected static $tableName = "comments";

    protected static $validationRules = [
        'movie_id'    => 'numeric,exists:\App\Models\Movie',
        'user_id'     => 'numeric,exists:\App\Models\User',
        'comment'     => 'minlength:10,maxlength:16000',
    ];

    public function user()
    {
        return new User($this->user_id);
    }

    public function movie()
    {
        return new Movie($this->movie_id);
    }
}