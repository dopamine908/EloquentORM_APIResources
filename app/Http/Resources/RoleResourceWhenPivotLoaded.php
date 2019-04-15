<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RoleResourceWhenPivotLoaded extends Resource
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
            'RoleId' => $this->ManyToManyRoleUserId,
            'Role' => $this->Role,
            /**
             * pivot有被讀取的話
             * 則會觸發whenPivotLoaded
             * 回傳closure內的值
             */
            'ManyToManyRoleUser_create_at' => $this->whenPivotLoaded('ManyToManyRoleUser', function () {
                return $this->pivot->created_at;
            }),
        ];
    }
}
