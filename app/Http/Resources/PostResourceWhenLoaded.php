<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Comment;
use App\Http\Resources\CommentCollection;

class PostResourceWhenLoaded extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'OneToManyPostId' => $this->OneToManyPostId,
            'UserId' => $this->UserId,
            'Post' => $this->Post,
            /**
             * whenLoaded 方法可以被用於有條件的載入關聯
             * 這個方法可以接受關聯名稱
             * 當model 有使用到這個關聯的時候
             * Comment才會被創造出來
             * 如果關聯沒有被載入
             * Comment會從資源回應中被完全刪除
             */
            'Comment' => new CommentCollection($this->whenLoaded('OneToManyComment')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
