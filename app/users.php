<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(users::class);
    }
}
