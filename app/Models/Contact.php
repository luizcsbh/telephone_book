<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'id','name', 'age'
    ];

    public function phones ()
    {
        return $this->hasMany(Phone::class, 'contact_id');
    }
}
