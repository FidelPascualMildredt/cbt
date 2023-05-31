
<form action="{{ url('/ordenadores') }}" method="post" enctype="multipart/form-data">
@csrf
@include('ordenadores.form',['modo'=>'Crear'])

</form>
