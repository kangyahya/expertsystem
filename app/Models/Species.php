<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static select(string $string, string $string1, \Illuminate\Contracts\Database\Query\Expression $raw)
 */
class Species extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'species';
    protected $fillable = ['species_name','quantity','deleted_at'];
    protected $guarded = [];
}
