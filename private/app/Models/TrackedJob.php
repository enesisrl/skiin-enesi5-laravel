<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackedJob extends Model
{
    protected $fillable = ['job_id', 'status'];
}