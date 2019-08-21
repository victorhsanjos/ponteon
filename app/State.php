<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
