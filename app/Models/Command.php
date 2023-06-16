<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = ['name', 'email', 'address', 'city', 'card_number', 'date_command', 'date_reciept', 'products'];
    use HasFactory;
}
