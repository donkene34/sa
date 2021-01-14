<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ad extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belognsTo('App\User');
    }
}
