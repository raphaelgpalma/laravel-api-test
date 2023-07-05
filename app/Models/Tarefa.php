<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefa';
    protected $fillable = ['title', 'description', 'status']; 
    protected $title;
    protected $description;
    protected $status;
}
