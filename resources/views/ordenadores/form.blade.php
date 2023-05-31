<!DOCTYPE html>
<html>

<head>
    <title>{{ $modo }} ordenadores</title>
    <!-- Agregar los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


</head>

<body>
    <div class="container mt-5">
        <h1>{{ $modo }} ordenadores</h1>

        <form action="{{ $modo == 'Crear' ? url('ordenadores') : url('ordenadores/' . $ordenadores->id) }}" method="POST">
            @csrf
            @if ($modo == 'Editar')
                @method('PUT')
            @endif

            <div class="form-group">
  <label for="serial_number">Número de serie</label> 
  <input type="text" name="serial_number" id="serial_number" class="form-control"
    value="{{ old('serial_number', isset($ordenadores->serial_number) ? $ordenadores->serial_number : '') }}">
  @error('serial_number')
    <span class="text-danger">{{ $message }}</span>
  @enderror

  <!-- Botón para generar el número de serie -->
  <button id="generate_button" class="btn btn-success" type="button" data-toggle="modal"
    data-target="#confirmModal">
    <i class="fa-solid fa-arrows-rotate fa-spin"></i> Generar número de serie
  </button>

  <!-- Modal de confirmación -->
  <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel">Confirmar cambio de número de serie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <i class="fa-solid fa-triangle-exclamation fa-beat fa-lg" style="color: #ff0000;"></i>
        ¿Está seguro de que desea cambiar el número de serie?
        </div>
        <div class="modal-body" style="text-align: justify;">
            "Recuerda que si cambias el número de serie, se modificará el QR, por lo que deberá ser impreso nuevamente.
             Esta es solo una sugerencia para considerar."
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="generateSerialNumber()">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function generateSerialNumber() {
      var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      var serialNumber = '';
      var serialSet = new Set();

      // Generar un número de serie único
      while (serialNumber === '' || serialSet.has(serialNumber)) {
        serialNumber = '';
        for (var i = 0; i < 12; i++) {
          var randomIndex = Math.floor(Math.random() * characters.length);
          serialNumber += characters.charAt(randomIndex);
        }
      }

      // Mostrar el número de serie en el campo de texto
      document.getElementById('serial_number').value = serialNumber;

      // Agregar el número de serie generado al conjunto para evitar repeticiones
      serialSet.add(serialNumber);

      // Cerrar el modal de confirmación
      $('#confirmModal').modal('hide');
    }
  </script>
</div>

            <div class="form-group">
                <label for="model">Modelo</label>
                <input type="text" class="form-control" name="model" id="model"
                    value="{{ isset($ordenadores->model) ? $ordenadores->model : '' }}">
                @error('model')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="brand">Marca</label>
                <input type="text" class="form-control" name="brand" id="brand"
                    value="{{ isset($ordenadores->brand) ? $ordenadores->brand : '' }}">
                @error('brand')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ram">RAM</label>
                <input type="text" class="form-control" name="ram" id="ram"
                    value="{{ isset($ordenadores->ram) ? $ordenadores->ram : '' }}">
                @error('ram')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="processor">Procesador</label>
                <input type="text" class="form-control" name="processor" id="processor"
                    value="{{ isset($ordenadores->processor) ? $ordenadores->processor : '' }}">
                @error('processor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="hard_disk">Disco Duro</label>
                <input type="text" class="form-control" name="hard_disk" id="hard_disk"
                    value="{{ isset($ordenadores->hard_disk) ? $ordenadores->hard_disk : '' }}">
                @error('hard_disk')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="network_connection">Conexión de Red</label>
                <input type="text" class="form-control" name="network_connection" id="network_connection"
                    value="{{ isset($ordenadores->network_connection) ? $ordenadores->network_connection : '' }}">
                @error('network_connection')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Ubicación</label>
                <input type="text" class="form-control" name="location" id="location"
                    value="{{ isset($ordenadores->location) ? $ordenadores->location : '' }}">
                @error('location')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ $modo }} DATOS</button>
            <a href="{{ url('ordenadores/') }}" class="btn btn-danger">Regresar</a>
        </form>
    </div>

    <!-- Agregar el enlace al archivo JavaScript de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
