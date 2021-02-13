<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penyakit;
use App\Models\Gejala;

class Relasi extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'relasis';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['penyakit_id', 'gejala_id'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function penyakits()
    {
        return $this->hasMany(Penyakit::class);
    }

    public function gejalas()
    {
        return $this->hasMany(Gejala::class);
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function getPenyakitIdAttribute($value)
    {
      $penyakit = Penyakit::find($value);
      $value = $penyakit['nama_penyakit'];
      return $value;
    }

    public function getGejalaIdAttribute($value)
    {
      $gejala = Gejala::find($value);
      $value = $gejala['gejala'];
      return $value;
    }
}
