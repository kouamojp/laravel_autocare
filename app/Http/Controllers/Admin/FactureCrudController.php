<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FactureRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FactureCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FactureCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Facture::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/facture');
        CRUD::setEntityNameStrings('facture', 'factures');
        /*CRUD::addColumn([
            'name' => 'montant', 
            'type' => 'number',
            'suffix' =>' FCFA'
        ]);*/
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
        CRUD::setValidation(FactureRequest::class);

       //CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */

        
        CRUD::addField([
            'label' => 'Numero bordereau',
            'name' => 'num_bordereau', 
            'type' => 'text'
        ]);

        CRUD::addField([
           'label' => 'Vehicule',
           'name' => 'vehicule',
           'entity' => 'vehicule',
           'type' => 'select2_multiple',  
           'attribute' => 'matricule', 
       ]);

        

        CRUD::addField([ 
            'name'            => 'date',
            'label'           => 'Date',
            'type'            => 'date',
        ]);

       /* CRUD::addField([
           'label' => 'Numéro du devis',
           'name' => 'devis',
           'entity' => 'devis',
           'type' => 'select2_multiple',  
           'attribute' => 'num_bordereau', 
       ]);*/

       CRUD::addField([
        'name' => 'montant_total',
        'type' => 'number'
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
