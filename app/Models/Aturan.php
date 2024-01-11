<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aturan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rules';
    protected $fillable = ['symptom_id', 'disease_id', 'confidence','deleted_at'];
}
