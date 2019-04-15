<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ManyToManyRoleUser';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ManyToManyRoleUserId';
}
