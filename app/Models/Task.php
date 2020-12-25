<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function incompleted($completed = false)
    {
        $this->update(compact('completed'));
    }

    public function completed($completed = true)
    {
        $this->update(compact('completed'));
    }
}
