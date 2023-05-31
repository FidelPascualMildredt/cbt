
<form action="{{ url('/usuarios/'.$usuarios->id)}}" method="post" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('usuarios.form',['modo'=>'Editar']);

</form>