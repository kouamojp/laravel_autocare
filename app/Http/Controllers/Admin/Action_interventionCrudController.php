<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Action_interventionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class Action_interventionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class Action_interventionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Action_intervention::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/action_intervention');
        CRUD::setEntityNameStrings('action_intervention', 'Liste des actions');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
       // CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */

        CRUD::addColumn(['name' => 'titre',
         'type' => 'text',
         'label' => 'Action'
     ]); 

        CRUD::addColumn([
            'label' => "Offre",
            'name' => 'offre_id',
            'entity' => 'offre',
            'type' => 'select',
            'attribute' => 'intitule'
        ]);
        
        CRUD::addColumn(['label' => 'Prix','name' => 'prix', 'type' => 'number','suffix'=>'FCFA']); 
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(Action_interventionRequest::class);
        $this->crud->setCreateContentClass('col-md-9');

      //  CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
        CRUD::addField([
            'label' => "Offre",
            'name' => 'offre_id',
            'entity' => 'offre',
            'type' => 'select',
            'attribute' => 'intitule'
        ]);



        CRUD::addField([
            'name'  => 'action',
            'label' => '',
            'type'  => 'repeatable',
            'fields' => [
                [
                    'label' => "Titre",
                    'name' => 'titre',
                    'type' => 'text',
                    'wrapper' => ['class' => 'form-group col-md-12'],
                ],


                [
                    'label' => "Prix",
                    'name' => 'prix',
                    'type' => 'number',
                    'suffix' => 'FCFA',
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ],


                [
                    'label' => "Echeance prochaine (en mois)",
                    'name' => 'echeance',
                    'type' => 'number',
                    'suffix' => 'Mois',
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ],
            ]
        ]);


        $this->crud->replaceSaveActions(
            [
                'name' => 'Enregistrer',
                'visible' => function($crud) {
                    return true;
                },
                'redirect' => function($crud, $request, $itemId) {
                    return $crud->route;
                },
            ],
        );



    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
