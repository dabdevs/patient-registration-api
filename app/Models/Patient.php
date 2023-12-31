<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use HasFactory, Notifiable; 

    public $fillable = [
        'email',
        'name',
        'phone_number',
        'document_photo'
    ];
}
