<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static findOrFail($id)
 */
class Ikan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'fishes';
    protected $fillable = ['type_id', 'fish_name','fish_latin_name', 'fish_age','fish_picture','fish_qty','deleted_at'];
    protected $guarded = [];
}
