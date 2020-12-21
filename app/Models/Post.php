<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    use HasFactory;

    //table name 
    //protected $table = "posts";

    // primary key
    //public $primaryKey = "id";

    //timestamp
    //public $timeStamp = false;
public function user() {
    return $this->belongTO('App\Models\User'); 
}

}
