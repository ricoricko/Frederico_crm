<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    public function lead() { return $this->belongsTo(Lead::class); }
    public function user() { return $this->belongsTo(User::class); }
    public function approver() { return $this->belongsTo(User::class, 'approved_by'); }
}
