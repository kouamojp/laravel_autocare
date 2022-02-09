<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Action_intervention;
use Illuminate\Http\Request;

class Action_interventionController extends Controller
{
    public function index(Request $request)
    {
        $search_term = $request->input('q');

        // NOTE: this is a Backpack helper that parses your form input into an usable array. 
        // you still have the original request as `request('form')`
        $form = collect($request->input('form'))->pluck('value', 'name');

        $options = Action_intervention::query();


        // if no offre has been selected, show no options
        if (! $form['offre_id']) {
            return [];
        }

        // if a offre has been selected, only show action_interventions in that offre
        if ($form['offre_id']) {
            $options = $options->where('offre_id', $form['offre_id']);
        }

        if ($search_term) {
            $results = $options->where('titre', 'LIKE', '%'.$search_term.'%')->paginate(10);
        } else {
            $results = $options->paginate(10);
        }

        return $results;
    }

    public function show($id)
    {
        return Action_intervention::find($id);
    }
}