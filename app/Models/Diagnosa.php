<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnosa extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $table = 'diagnosa';
  protected $fillable = ['fish_id','user_id','symptom_id', 'disease_id', 'tanggal','deleted_at'];
}
