
<form action="{{ url('/equipments/'.$equipments->id)}}" method="post" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('equipments.form',['modo'=>'Editar'])

</form>