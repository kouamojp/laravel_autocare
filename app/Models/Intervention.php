<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'interventions';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    //protected $fillable = ['date_interv', 'type', 'kilometrage', 'prochaine_interv'];
    // protected $hidden = [];
    // protected $dates = [];

    public $casts = [
        'actions'       => 'object',
    ];

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
    public function technicien()
    {
        return $this->belongsToMany('App\Models\Technicien', 'intervention_tech');
    }

    public function vehicule()
    {
        return $this->belongsTo('App\Models\Vehicule');
    }

    public function offre()
    {
        return $this->belongsTo('App\Models\Offre');
    }

    public function action_intervention()
    {
        return $this->hasMany('App\Models\Action_intervention');
    }




    

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
