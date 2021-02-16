@if ($crud->hasAccess('berobat'))
<a href="{{ url($crud->route.'/'.$entry->getKey().'/berobat') }} " class="btn btn-xs btn-primary"><i class="la la-hospital-alt"></i> berobat</a>
@endif
