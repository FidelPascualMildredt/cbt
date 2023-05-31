

<form action="{{ url('/usuarios') }}" method="post" enctype="multipart/form-data">
@csrf
@include('usuarios.form',['modo'=>'Crear']);

</form>