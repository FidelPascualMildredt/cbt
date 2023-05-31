

<form action="{{ url('/equipments') }}" method="post" enctype="multipart/form-data">
@csrf
@include('equipments.form',['modo'=>'Crear'])

</form>