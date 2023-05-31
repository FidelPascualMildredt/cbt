
<form action="{{ url('/mouses') }}" method="post" enctype="multipart/form-data">
@csrf
@include('mouses.form',['modo'=>'Crear'])

</form>

