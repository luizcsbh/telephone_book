<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $table = 'phones';

    protected $fillable = [
        'id','contact_id','number'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

}
