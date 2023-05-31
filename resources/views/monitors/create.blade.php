
<form action="{{ url('/monitors') }}" method="post" enctype="multipart/form-data">
@csrf
@include('monitors.form',['modo'=>'Crear'])

</form>