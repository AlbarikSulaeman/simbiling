<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Question extends Eloquent {
    use SoftDeletes;

    // protected $connection = 'mongodb';
    protected $collection = 'questions';
    protected $guarded = ['id','_id'];
    protected $primaryKey = '_id';
    protected $dates = ['deleted_at','created_at', 'updated_at', 'datetime' ];   
}
