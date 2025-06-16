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

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function getCreated()
    {
        return $this->attributes('created_at');
    }

    public function setUpdatedAt($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
