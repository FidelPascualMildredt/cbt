@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
    <div class="alert alert-success"><i class="fa-regular fa-thumbs-up">  {{ Session::get('mensaje') }}</i></div>
@endif

<button onclick="window.location.href = '{{ url('equipments/create') }}'">
<span class="box"><i class="fa-solid fa-computer" style="color: #0049ff;"> +
    Registrar nuevo equipo
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

<table class="table table-sm">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>NÚMERO DE SERIE</th>
            <th>ESTADO</th>
            <th>QR</th>
            <th>TECLADO</th>
            <th>MOUSE</th>
            <th>MONITOR</th>
            <th>ORDENADOR</th>
            <th>ACCIÓNES</th>
        </tr>
    </thead>
    <tbody id="tabla-equipos">
        @foreach($equipments as $equipment)
            <tr>
                <td>{{ $equipment->id }}</td>
                <td>{{ $equipment->serial_number }}</td>
                <td>{{ $equipment->status }}</td>
                {{-- <td>{{ $equipment->QR }}</td> --}}
                <td>
                    <div class="title m-b-md">
                        {!! QrCode::size(100)->generate(route('equipments.show', $equipment->id)) !!}
                    </div>
                </td>
                <td>{{ $equipment->keyboard_serial_number }}</td>
                <td>{{ $equipment->mouse_serial_number }}</td>
                <td>{{ $equipment->monitor_serial_number }}</td>
                <td>{{ $equipment->ordenador_serial_number }}</td>
                <td>
                    <form action="{{ url('/equipments/'.$equipment->id ) }}" method="post">
                        <!-- Editar -->
                        <a href="{{ url('/equipments/'.$equipment->id.'/edit')}}" class="btn btn-warning btn-sm m-2 editar">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
                        <!-- Ver -->
                        <a href="equipments/{{$equipment->id}}" class="btn btn-primary m-2 ver" style="color: #000000;">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm m-2 eliminar" style="color: #000000;" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $equipment->id }}">
    <i class="fa-regular fa-trash-can"></i>
</button>
                        <!-- Modal de confirmación de eliminación -->
                        <div class="modal fade" id="confirmDeleteModal{{ $equipment->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="https://ramonnevarez.files.wordpress.com/2014/05/pc-escritorio.jpg" class="card-img-top" alt="Mouse Image" width="150" height="350">
                                        ¿Estás seguro de que quieres eliminar este equipo?  : {{$equipment->serial_number}}
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
<div class="d-flex justify-content-between align-items-center mt-3">
    {{ $equipments->render('pagination::bootstrap-4') }}
    <a href="{{ url('/pdf') }}" class="btn btn-success">Imprimir</a>
</div>
</div>

<script>
function buscar() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla-equipos");
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
