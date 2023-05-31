
<form action="{{ url('/keyboards') }}" method="post" enctype="multipart/form-data">
@csrf
@include('keyboards.form',['modo'=>'Crear'])

</form>

