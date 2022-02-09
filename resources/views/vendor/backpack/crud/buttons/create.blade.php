@if ($crud->hasAccess('create'))
<!--<a href="{{ url($crud->route.'/create') }}" class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i>  Ajouter {{ $crud->entity_name }}</span></a>-->
<a href="{{ url($crud->route.'/create') }}" class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i class="la la-plus"></i>  Ajouter</span></a>
@endif