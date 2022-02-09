<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offre;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class offreController extends Controller
{
    public function index(Request $request)
    {
        $search_term = $request->input('q');

        // NOTE: this is a Backpack helper that parses your form input into an usable array. 
        // you still have the original request as `request('form')`
        $form = collect($request->input('form'))->pluck('value', 'name');

       // dd($form);

        $options = vehicule::query();

        // 
        if (! $form['type_contrat']) {
            return [];
        }

        // 
        if ($form['type_contrat'] == 'contractuelle') {

            $options = $options->with('offre')->where('id', $form['vehicule_id'])->get()->pluck('offre')[0]->pluck('id');
            $options = Offre::query()->whereIn('id', $options);


        }
        else{
            if ($form['type_contrat'] == 'non contractuelle') {
                //$options = $options->where('id', $form['vehicule_id'])->get()->pluck('offre')[0][0];
               $options = offre::query();
           }
       }

       if ($search_term) {
        $results = $options->where('intitule', 'LIKE', '%'.$search_term.'%')->paginate(10);
    } else {
        $results = $options->paginate(10);
    }

   // return dd($results);
    return $results;

}

public function show($id)
{
    return offre::find($id);
}
}