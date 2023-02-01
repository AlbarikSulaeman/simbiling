<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Rombel extends Eloquent {
    use SoftDeletes;

    // protected $connection = 'mongodb';
    protected $collection = 'rombels';
    protected $guarded = ['id','_id'];
    protected $primaryKey = '_id';
    protected $dates = ['deleted_at','created_at', 'updated_at', 'datetime' ];
    

}
