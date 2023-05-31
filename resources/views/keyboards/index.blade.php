@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
    <div class="alert alert-success">{{ Session::get('mensaje') }}</div>
@endif

<!-- <i class="fa-regular fa-keyboard" style="color: #000000;"><a href="{{ url('keyboards/create') }}"></i> Registrar nuevo Teclado</a> -->
<button onclick="window.location.href = '{{ url('keyboards/create') }}'">
<span class="box"><i class="fa-solid fa-computer" style="color: #0049ff;"> +
    Registrar nuevo keyboard
    </span></i>
</button>

<div class="input-container ">
<input type="text" id="buscar" name="text" onkeyup="buscar()" placeholder="Buscador..." class="buscador input" >
  <span class="icon">
    <svg width="89px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>
  </span>
</div>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>NÚMERO DE SERIE</th>
            <th>MODELO</th>
            <th>MARCA</th>
            <th>TIPO DE CONEXIÓN</th>
            <th>ESTADO</th>
            <th>UBICACIÓN</th>
            <th>ACCIÓNES</th>

        </tr>
    </thead>

    <tbody id="tabla-keyboards">
         @foreach( $keyboards as $keyboard )
        <tr>
            <td>{{ $keyboard->id }}</td>
            <td>{{ $keyboard->serial_number }}</td>
            <td>{{ $keyboard->model }}</td>
            <td>{{ $keyboard->brand }}</td>
            <td>{{ $keyboard->connection_type }}</td>
            <td>{{ $keyboard->status }}</td>
            <td>{{ $keyboard->location }}</td>
            <td>




        <form action="{{ url('/keyboards/'.$keyboard->id ) }}" method="post">

        <!-- Editar -->
        <a href="{{ url('/keyboards/'.$keyboard->id.'/edit')}}" class="btn btn-warning m-2 editar"><i class="fa-solid fa-pen-to-square"></i></a>

         <!-- Ver -->
         <a  href="keyboards/{{$keyboard->id}}"  class="btn btn-primary m-2 ver" style="color: #000000;" ><i class="fa-regular fa-eye"></i></a>

            @csrf
            {{ method_field('DELETE') }}
            <button type="button" class="btn btn-danger m-2 eliminar" style="color: #000000;" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $keyboard->id }}">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                        <!-- Modal de confirmación de eliminación -->
                        <div class="modal fade" id="confirmDeleteModal{{ $keyboard->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <img src="https://res.cloudinary.com/rsc/image/upload/b_rgb:FFFFFF,c_pad,dpr_1.0,f_auto,h_758,q_auto,w_1350/c_pad,h_758,w_1350/F7950930-01?pgw=1&pgwact=1" class="card-img-top" alt="Mouse Image" width="150" height="250">
                                    <div class="modal-body">
                                        ¿Estás seguro de que quieres eliminar este teclado?:  {{$keyboard->serial_number}}
                                    </div>

                                    <div class="modal-footer">

                                    <div class="loader">
                                    <span class="E">E</span>
                                    <span class="S">S</span>
                                    <span class="P">P</span>
                                    <span class="E">E</span>
                                    <span class="R">R</span>
                                    <span class="A">A</span>
                                    <span class="N">N</span>
                                    <span class="D">D</span>
                                    <span class="O">O</span>
                                    <span class="d1">:</span>
                                    <span class="d2">:</span>
                                    </div>

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

    </td>
</tr>
@endforeach
    </tbody>
</table>
{{ $keyboards->render('pagination::bootstrap-4') }}
</div>

<script>
function buscar() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla-keyboards");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    var found = false;
    for (var j = 0; j < tr[i].cells.length; j++) {
      td = tr[i].cells[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          found = true;
          break;
        }
      }
    }
    if (found) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}
</script>

@endsection
