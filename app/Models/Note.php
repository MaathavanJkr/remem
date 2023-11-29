<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Stack;
class Note extends Model
{
    use HasFactory;
    public function stack()
    {
        return $this->belongsTo(Stack::class);
    }
}
