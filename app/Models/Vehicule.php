<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'vehicules';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    public function intervention()
    {
        return $this->hasMany('App\Models\Intervention');
    }
    
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function offre()
    {
        return $this->belongsToMany('App\Models\Offre', 'offre_vehicule');
    }

    public function devis()
    {
        return $this->belongsToMany('App\Models\Devis', 'devis_vehicule');
    }

    public function facture()
    {
        return $this->belongsToMany('App\Models\Facture', 'facture_vehicule');
    }

  /*  public function intervention()
    {
        return $this->hasMany('App\Models\intervention');
    }*/
    /*  public function contrat()
    {
        return $this->belongsToMany('App\Models\Contrat');
    }*/


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
}
