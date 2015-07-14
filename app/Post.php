<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

	use SoftDeletes;

    /**
     * Enable soft deletes
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'body'];


    public static $rules = [
        'title' => 'required',
        'slug'  => 'unique:posts',
        'body'  => 'required'
    ];

}
