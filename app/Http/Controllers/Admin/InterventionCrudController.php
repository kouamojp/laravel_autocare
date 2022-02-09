<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InterventionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;



/**
 * Class InterventionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InterventionCrudController extends CrudController
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

      CRUD::setModel(\App\Models\Intervention::class);
      CRUD::setRoute(config('backpack.base.route_prefix') . '/intervention');
      CRUD::setEntityNameStrings('intervention', 'interventions');
      //CRUD::setCreateView('pages.intervention');

      CRUD::addColumn([
        'label' => 'Type d\'intervention', 
        'name' => 'type_contrat', 
        'type' => 'enum']);

      CRUD::addColumn([
        'label' => 'Vehicule',
        'name' => 'vehicule_id',
        'entity' => 'vehicule',
        'type' => 'select',  
        'attribute' => 'matricule', 
      ]);


      CRUD::addColumn([
        'label' => 'Offres',
        'name' => 'offre_id',
        'entity' => 'offre',
        'type' => 'select',  
        'attribute' => 'intitule', 
      ]);
      
      CRUD::addColumn([
       'label' => 'kilométrage',
       'name' => 'km',
       'type' => 'number',
       'suffix' => 'Km'
     ]);

      CRUD::addColumn([
        'label' => 'Les actions',
        'name' => 'actions',
        'type' => 'repeatable',

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




        /*CRUD::addColumn([
          'label' => 'Date',
          'name' => 'date',
          'type' => 'date'
        ]);

        CRUD::addColumn([
         'label' => 'véhicule',
         'name' => 'vehicule_id',
         'entity' => 'vehicule',
         'type' => 'select',  
         'attribute' => 'matricule', 
       ]);


        CRUD::addColumn([
          'label' => 'Technicien(s)',
          'name' => 'technicien',
          'entity' => 'technicien',
          'type' => 'select',  
          'attribute' => 'nom', 
        ]);

        CRUD::addColumn([
          'label' => 'Actions',
          'name' => 'actions',
          'type' => 'repeatable',

        ]);

        CRUD::addColumn([
         'label' => 'kilométrage',
         'name' => 'km',
         'type' => 'number',
         'suffix' => 'Km'
       ]);

        CRUD::addColumn([
          'label' => 'Type d\'intervention', 
          'name' => 'type_contrat', 
          'type' => 'enum']);


        CRUD::addColumn([
          'label' => 'Offres',
          'name' => 'offre_id',
          'entity' => 'offre',
          'type' => 'select',  
          'attribute' => 'intitule', 
        ]);*/



      }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
      CRUD::setValidation(InterventionRequest::class);
      $this->crud->setCreateContentClass('col-md-10');
      $this->crud->setSubheading('Ajouter une intervention', 'create');
     // $this->crud->setCreateView('create_intervention');

      // CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */


        CRUD::addField([
          'label' => 'Date',
          'name' => 'date',
          'type' => 'date', 
          'wrapper' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
          'label' => 'Véhicule',
          'name' => 'vehicule_id',
          'entity' => 'vehicule',
          'type' => 'select2',  
          'attribute' => 'matricule', 
          'wrapper' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
          'label' => 'Technicien(s)',
          'name' => 'technicien',
          'entity' => 'technicien',
          'type' => 'select2_multiple',  
          'attribute' => 'nom', 
        ]);

        CRUD::addField([
         'label' => 'kilométrage',
         'name' => 'km',
         'type' => 'number',
         'suffix' => 'Km',
         'wrapper'   => [
          'class' => 'col-sm-6',
        ],
      ]);

        CRUD::addField([
          'name'        => 'type_contrat',
          'label'       => "Type d'intervention",
          'type'        => 'select_from_array',
          'options'     => ['contractuelle' => 'contractuelle', 'non contractuelle' => 'non contractuelle'],
          'allows_null' => false,
          'default'     => 'contractuelle',
          'wrapper'   => [
            'class' => 'col-sm-6',
          ],
        ]);




        CRUD::addfield([
          'label'                => "Offre", 
          'type'                 => 'select2_from_ajax',
          'name'                 => 'offre_id',
          'entity'               => 'offre', 
          'attribute'            => 'intitule', 
          'data_source'          => url('api/offre'), 
          'placeholder'          => 'Selectionner une offre',
          'include_all_form_fields' => true, 
          'minimum_input_length' => 0, 
          'dependencies'         => ['type_contrat','vehicule_id'],    
        ]);





        CRUD::addField([
          'name'  => 'actions',
          'label' => '',
          'type'  => 'repeatable',
          'fields' => [
            [
              'label'                => "Intitulé de l'action", 
              'type'                 => 'select2_from_ajax',
              'name'                 => 'action',
              'entity'               => 'action_intervention',
              'attribute'            => 'titre', 
              'data_source'          => url('api/action_intervention'),
              'placeholder'          => 'Selectionner l\'action à effectuer', 
              'include_all_form_fields' => true,
              'minimum_input_length' => 0, 
              'dependencies'         => ['offre_id'],
              'wrapper' => ['class' => 'form-group col-md-4']
            ],


            [
              'label' => "Echeance prochaine",
              'name' => 'echeance',
              'type' => 'date',
              'wrapper' => ['class' => 'form-group col-md-4'],
            ],

            [
              'label' => "Prix",
              'name' => 'prix',
              'type' => 'number',
              'suffix' => 'FCFA',
              'include_all_form_fields' => true,
              'wrapper' => ['class' => 'form-group col-md-4'],
            ],

            [
              'label' => "Données à conserver",
              'name' => 'donnee',
              'type' => 'textarea',
              'wrapper' => ['class' => 'form-group col-md-12'],
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
