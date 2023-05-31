
<form action="{{ url('/mouses/'.$mouses->id)}}" method="post" enctype="multipart/form-data">

@csrf
{{method_field('PATCH')}}
@include('mouses.form',['modo'=>'Editar'])

</form>
