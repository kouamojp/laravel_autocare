<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VehiculeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VehiculeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VehiculeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Vehicule::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/vehicule');
        CRUD::setEntityNameStrings('vehicule', 'vehicules');
        CRUD::addColumn([
            'label' => 'client',
            'name' => 'client_id',
            'type' => 'select',
            'entity' => 'client',
        ]); 


    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(VehiculeRequest::class);

        //CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
        CRUD::addField([
            'label' => 'client',
            'name' => 'client_id',
            'type' => 'select2',
            'entity' => 'client',
        ]); 


        CRUD::addField(['name' => 'matricule', 
            'type' => 'text',
            'wrapper' => ['class' => 'form-group col-md-4']
        ]);
        CRUD::addField(['name' => 'marque',
         'type' => 'text',
         'wrapper' => ['class' => 'form-group col-md-4']
     ]);
        CRUD::addField(['name' => 'model', 
            'type' => 'text',
            'wrapper' => ['class' => 'form-group col-md-4']
        ]);
        CRUD::addField([
          'label' => 'Type', 
          'name' => 'type', 
          'type' => 'enum',
          'wrapper' => ['class' => 'form-group col-md-6']
      ]);

        CRUD::addField(['label' => 'Type de contrat',
            'name' => 'type_contrat', 
            'type' => 'enum',
            'wrapper' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField(['label' => 'Numero du chassi',
            'name' => 'chassi', 'type' => 'text',
            'wrapper' => ['class' => 'form-group col-md-4']
        ]);
        CRUD::addField(['name' => 'annee', 'type' => 'text', 
            'wrapper' => ['class' => 'form-group col-md-4']
        ]);
        CRUD::addField(['name' => 'km', 'type' => 'number', 
            'suffix' => 'Km',
            'wrapper' => ['class' => 'form-group col-md-4']
        ]);


        CRUD::addField([
         'label' => 'Offre(s) souscrite(s)',
         'name' => 'offre',
         'entity' => 'offre',
         'type' => 'select2_multiple',  
         'attribute' => 'intitule', 
     ]);    


        CRUD::addField([ 'label' => "Date d'entrée",
            'name' => 'date_in',
            'type' => 'date',
            'wrapper' => ['class' => 'form-group col-md-6']
        ]);
        CRUD::addField(['label' => "Date de sortie",
            'name' => 'date_out',  'type' => 'date',
            'wrapper' => ['class' => 'form-group col-md-6']
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
