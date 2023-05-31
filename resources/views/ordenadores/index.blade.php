@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Éxito!</strong> {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<!-- <i class="fa-solid fa-mobile" style="color: #000000;"><a href="{{ url('ordenadores/create') }}"></i> Registrar nuevo ordenador</a> -->

<button onclick="window.location.href = '{{ url('ordenadores/create') }}'">
<span class="box"><i class="fa-solid fa-computer" style="color: #0049ff;"> +
    Registrar nuevo ordenador
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
            <th>RAM</th>
            <th>PROCESADOR</th>
            <th>DISCO DURO</th>
            <th>CONEXIÓN DE RED</th>
            <th>UBICACIÓN</th>
            <th>ACCIÓNES</th>

        </tr>
    </thead>

    <tbody id="tabla-ordenadors">
         @foreach( $ordenadores as $ordenador )
        <tr>
            <td>{{ $ordenador->id }}</td>
            <td>{{ $ordenador->serial_number }}</td>
            <td>{{ $ordenador->model }}</td>
            <td>{{ $ordenador->brand }}</td>
            <td>{{ $ordenador->ram }}</td>
            <td>{{ $ordenador->processor }}</td>
            <td>{{ $ordenador->hard_disk }}</td>
            <td>{{ $ordenador->network_connection }}</td>
            <td>{{ $ordenador->location }}</td>
            <td>


        <form action="{{ url('/ordenadores/'.$ordenador->id ) }}" method="post">
            <!-- Editar -->
        <a href="{{ url('/ordenadores/'.$ordenador->id.'/edit')}}" class="btn btn-warning m-2 editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <!-- Ver -->
        <a  href="ordenadores/{{$ordenador->id}}"  class="btn btn-primary m-2 ver" style="color: #000000;" ><i class="fa-regular fa-eye"></i></a>
            <!-- Eliminar -->
        @csrf
            {{ method_field('DELETE') }}
            <button type="button" class="btn btn-danger m-2 eliminar" style="color: #000000;" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $ordenador->id }}">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                        <!-- Modal de confirmación de eliminación -->
                        <div class="modal fade" id="confirmDeleteModal{{ $ordenador->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <img src="https://images.milanuncios.com/api/v1/ma-ad-media-pro/images/74b3c4e2-821b-4f05-953c-b5b816d323a7?rule=hw396_70" class="card-img-top" alt="Mouse Image" width="150" height="350">
                                    <div class="modal-body">
                                        ¿Estás seguro de que quieres eliminar este ordenador?:  {{$ordenador->serial_number}}
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
{{ $ordenadores->render('pagination::bootstrap-4') }}
</div>


<script>
function buscar() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla-ordenadors");
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
