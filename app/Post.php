<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'OneToManyPost';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'OneToManyPostId';

    public function OneToManyComment() {
        return $this->hasMany(
            'App\Comment', //relation
            'OneToManyPostId', // OneToManyComment.OneToManyPostId
            'OneToManyPostId' // OneToManyPost.OneToManyPostId
        );
    }
}
