<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Action_intervention;

class Action_interventionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
     return 
     [
         'offre_id' => 'required',
         'repeatable' => function($attribute, $value, $fail) {
           $fieldGroups = json_decode($value);

                     // allow repeatable field group to be empty
           if (count($fieldGroups) === 0) {
             return true;
         }

                     // run through each field group inside the repeatable field
                     // and run a custom validation for it
         foreach ($fieldGroups as $key) {
             $fieldGroupValidator = Validator::make((array)$key, [ 
                   //'offre_id' => '', 
                 'titre' => 'required',
                 'prix' => 'required',
                 'echeance' => 'required',
             ]);

             if ($fieldGroupValidator->fails())
             {
                return $fail('Une des entrées non valide.');
            }
            else
            {
             Action_intervention::updateOrCreate([ 'offre_id'=>$this->get('offre_id') ,'titre'=>$key->titre,'prix' => $key->prix, 'echeance' => $key->echeance]);
         }
     }
 },
];
}

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
