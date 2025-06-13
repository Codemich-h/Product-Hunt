<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;

    public function setUserName($user_name) 
    {
        $this->attributes['user_name'] = $user_name;
    } 

    public function getUserName()
    {
        return $this->attributes['user_name'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setTotal()
    {
        $this->attributes['total']
    }
}
