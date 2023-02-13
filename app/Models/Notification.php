<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Notification extends Eloquent {
    use SoftDeletes;

    // protected $connection = 'mongodb';
    protected $collection = 'notifications';
    protected $guarded = ['id','_id'];
    protected $primaryKey = '_id';
    protected $dates = ['deleted_at','created_at', 'updated_at', 'datetime' ];
    

}
