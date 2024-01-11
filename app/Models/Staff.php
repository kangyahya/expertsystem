<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static select(string $string, string $string1, \Illuminate\Contracts\Database\Query\Expression $raw)
 */
class Staff extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $table = 'staff';
  protected $fillable = ['user_id','jabatan','tanggal','jenis_kelamin','alamat','deleted_at'];
  protected $guarded = [];
}
