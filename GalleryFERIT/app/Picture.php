<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'picture';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['p_name', 'description','p_dir','type'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    //protected $casts = [
    //    'prior_languages' => 'array',
    //];

}