<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Flight';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'FlightId';
}
