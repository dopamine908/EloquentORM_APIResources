<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($item) {
                return [
                    'OneToManyCommentId' => $item->OneToManyCommentId,
                    'OneToManyPostId' => $item->OneToManyPostId,
                    'Comment' => $item->Comment
                ];
            }),
        ];
    }
}
