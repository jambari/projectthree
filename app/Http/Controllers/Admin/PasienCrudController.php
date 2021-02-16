<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PasienRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PasienCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PasienCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Pasien::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pasien');
        CRUD::setEntityNameStrings('pengguna', 'pengguna');
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
         $this->crud->addColumns(['nama','alamat','gender','usia', 'satuan','penyakit_id','nomor_hp',
         'pekerjaan','berobat', 'created_at', 'updated_at' ]);
         $this->crud->setColumnDetails('gender', ['label' => 'jenis kelamin']);
         $this->crud->setColumnDetails('satuan', ['label' => 'Ket']);
         $this->crud->setColumnDetails('nomor_hp', ['label' => 'HP']);
         $this->crud->setColumnDetails('created_at', ['label' => 'tanggal konsul']);
         $this->crud->setColumnDetails('updated_at', ['label' => 'tanggal berobat']);
         $this->crud->setColumnDetails('penyakit_id', ['label' => 'Penyakit', 'class' => 'bg-danger']);
         $this->crud->removeButtons(['create','update']);
         $this->crud->enableExportButtons();
         $this->crud->disableResponsiveTable();
         $this->crud->setPageLengthMenu(5);
         $this->crud->allowAccess('berobat');
         $this->crud->addButtonFromView('line', 'berobat', 'berobat', 'beginning');

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PasienRequest::class);

        CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
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

    public function berobat($id)
    {
      $pasien = $this->crud->getEntry($id);
      $pasien->berobat = 1;
      $pasien->save();
      return back();
    }
}
