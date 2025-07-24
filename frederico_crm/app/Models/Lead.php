<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
 public function project() { return $this->hasOne(Project::class); }
    //
}
