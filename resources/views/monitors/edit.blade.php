
<form action="{{ url('/monitors/'.$monitors->id)}}" method="post" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('monitors.form',['modo'=>'Editar'])

</form>
