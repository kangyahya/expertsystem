<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @method static paginate(int $int)
 * @method static create(array $array)
 * @method static findOrFail($symptom_code)
 */
class Gejala extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'symptoms';
    protected $fillable = [
      'symptom_code',
      'symptom_name','deleted_at'
    ];
    protected $guarded = [];

    public function Aturan()
    {
      return $this->hasMany(Aturan::class,'symptom_id');
    }
}
