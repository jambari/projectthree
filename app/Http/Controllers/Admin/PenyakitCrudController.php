<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PenyakitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PenyakitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PenyakitCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Penyakit::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/penyakit');
        CRUD::setEntityNameStrings('penyakit', 'penyakit');
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
         $this->crud->addColumn('nama_penyakit');
         //$this->crud->allowAccess('details_row');
         //$this->crud->enableDetailsRow();


    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PenyakitRequest::class);

        //CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
        $this->crud->addField(
            [
                'name'  => 'nama_penyakit',
                'type'  => 'text',
                'label' => 'Nama Penyakit'

            ]
        );

        $this->crud->addField(
          [
              'name'  => 'deskripsi',
              'label' => 'Deskripsi',
              'type'  => 'summernote',
              'options' => [
                'toolbar' => [
                  ['style', ['style']],
                  ['font', ['bold', 'underline', 'clear']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['table', ['table']],
                  ['insert', ['link', 'picture', 'video']],
                  ['view', ['fullscreen', 'codeview', 'help']]
                ]
              ],
          ],
        );

        $this->crud->addField(
          [
              'name'  => 'saran',
              'label' => 'Saran',
              'type'  => 'summernote',
              'options' => [
                'toolbar' => [
                  ['style', ['style']],
                  ['font', ['bold', 'underline', 'clear']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['table', ['table']],
                  ['insert', ['link', 'picture', 'video']],
                  ['view', ['fullscreen', 'codeview', 'help']]
                ]
              ],
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

    public function showDetailsRow($id)
    {
      $penyakit = $this->crud->getEntry($id);
      return view('details.penyakit')->with(compact('penyakit'));
    }
}
