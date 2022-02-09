@extends(backpack_view('blank'))

@php
$widgets['before_content'][] = [
'type'        => 'jumbotron',
'heading'     => trans('Tableau de bord'),
//'content'     => trans('backpack::base.use_sidebar'),
//'button_link' => backpack_url('logout'),
//'button_text' => trans('backpack::base.logout'),
];

$nbre_vehicule = App\Models\Vehicule::count();
$nbre_client = App\Models\Client::count();
$nbre_interv = App\Models\Intervention::count();

$vehicules= App\Models\Vehicule::all();




$widgets['after_content'][] = [
'type'    => 'div',
'class'   => 'row',

'content' => [

[ 'type' => 'card', 
'content'    => [
'header' => 'Nombre de véhicules :'.$nbre_client,  
'body'   => ''
]],



[ 'type' => 'card', 
'content'    => [
'header' => 'Nombre de clients :'.$nbre_client,  
'body'   => ''
]],

[ 'type' => 'card', 
'content'    => [
'header' => 'Nombre d\'intervention :'.$nbre_interv,  
'body'   => ''
]],

]
]



@endphp

@section('content')
@endsection