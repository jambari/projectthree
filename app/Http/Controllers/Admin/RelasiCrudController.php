<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RelasiRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RelasiCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RelasiCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Relasi::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/relasi');
        CRUD::setEntityNameStrings('relasi', 'relasi');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
         $this->crud->addColumns(['penyakit_id', 'gejala_id']);

        //  $this->crud->addFilter([
        //    'name'        => 'penyakit_id',
        //    'type'        => 'select2_ajax',
        //    'label'       => 'Penyakit',
        //    'placeholder' => 'Pilih Penyakit'
        //  ],
        //  url('admin/relasi/ajax-penyakit-options'), // the ajax route
        //  function($value) { // if the filter is active
        //      $this->crud->addClause('where', 'nama_penyakit', $value);
        //  });

        $this->crud->addFilter([
          'name'  => 'penyakit_id',
          'type'  => 'select2',
          'label' => 'Penyakit'
        ], function () {
          return [
            1 => 'DBD Tingkat I',
            2 => 'DBD Tingkat II',
            3 => 'DBD Tingkat III',
          ];
        }, function ($value) { // if the filter is active
          $this->crud->addClause('where', 'penyakit_id', $value);
        });
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RelasiRequest::class);

        //CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */

         $this->crud->addField(
           [  // Select2
              'label'     => "Penyakit",
              'type'      => 'select2',
              'name'      => 'penyakit_id', // the db column for the foreign key

              // optional
              'entity'    => 'penyakits', // the method that defines the relationship in your Model
              'model'     => "App\Models\Penyakit", // foreign key model
              'attribute' => 'nama_penyakit', // foreign key attribute that is shown to user

               // also optional
              'options'   => (function ($query) {
                   return $query->orderBy('nama_penyakit', 'ASC')->get();
               }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
           ],
           );

           $this->crud->addField(
             [  // Select2
                'label'     => "Gejala",
                'type'      => 'select2',
                'name'      => 'gejala_id', // the db column for the foreign key

                // optional
                'entity'    => 'gejalas', // the method that defines the relationship in your Model
                'model'     => "App\Models\Gejala", // foreign key model
                'attribute' => 'gejala', // foreign key attribute that is shown to user

                 // also optional
                'options'   => (function ($query) {
                     return $query->orderBy('gejala', 'ASC')->get();
                 }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
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

    //filter
    public function penyakitOptions(Request $request) {
      $term = $request->input('term');
      $options = App\Models\Penyakit::where('nama_penyakit', 'like', '%'.$term.'%')->get()->pluck('nama_penyakit', 'id');
      return $options;
    }
}
