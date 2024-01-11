<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyakit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'diseases';
    protected $fillable = ['disease_code','disease_name', 'reason','picture','information','solution','deleted_at'];
    protected $guarded = [];
}
