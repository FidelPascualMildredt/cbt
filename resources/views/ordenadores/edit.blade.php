
<form action="{{ url('/ordenadores/'.$ordenadores->id)}}" method="post" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('ordenadores.form',['modo'=>'Editar'])

</form>
