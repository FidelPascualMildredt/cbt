@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<a href="{{ url('usuarios/create') }}">Registrar nuevo usuario</a>

<input type="text" id="buscar" onkeyup="buscar()" placeholder="Buscar por nombre..." class="buscador">

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre del Usuario</th>
            <th>Apellido Paterno</th>
            <th>Fn</th>
            <th>Genero</th>
            <th>Email</th>
            <th>Password</th>
            <th>Datos</th>
            <th>Acciónes</th>
        </tr>
    </thead>

    <tbody id="tabla-usuarios">
        @foreach( $usuarios as $usuario )
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>
                <img src="{{asset('storage').'/'.$usuario->Foto}}" width="100">
            </td>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->app }}</td>
            <td>{{ $usuario->fn }}</td>
            <td>{{ $usuario->gen }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->pass }}</td>
            <td>{{ $usuario->datos }}</td>
            <td>
            
            <a href="{{ url('/usuarios/'.$usuario->id.'/edit')}}">
                 Editar
            </a>

        <form action="{{ url('/usuarios/'.$usuario->id ) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
        <input type="submit" onclick="return confirm ('¿Quieres borrar?')" value="Borrar">

        </form>
            
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<script>
function buscar() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla-usuarios");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (filter.length >= 3 && txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else if (filter.length < 3) {
        tr[i].style.display = ""; // Mostrar todos los registros si el filtro está vacío
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

@endsection