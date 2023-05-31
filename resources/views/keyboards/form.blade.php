<!DOCTYPE html>
<html>
<head>
    <title>{{ $modo }} Teclados</title>
    <!-- Agregar los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $modo }} keyboards</h1>

        <form action="{{ $modo == 'Crear' ? url('keyboards') : url('keyboards/' . $keyboards->id) }}" method="POST">
            @csrf
            @if ($modo == 'Editar')
                @method('PUT')
            @endif

            <div class="form-group">
  <label for="serial_number">Número de serie</label> 
  <input type="text" name="serial_number" id="serial_number" class="form-control"
    value="{{ old('serial_number', isset($keyboards->serial_number) ? $keyboards->serial_number : '') }}">
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
                <input type="text" name="model" id="model"
                    value="{{ isset($keyboards->model) ? $keyboards->model : '' }}" class="form-control">
                @error('model')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="brand">Marca</label>
                <input type="text" name="brand" id="brand"
                    value="{{ isset($keyboards->brand) ? $keyboards->brand : '' }}" class="form-control">
                @error('brand')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="connection_type">Tipo de conexión</label>
                <input type="text" name="connection_type" id="connection_type"
                    value="{{ isset($keyboards->connection_type) ? $keyboards->connection_type : '' }}" class="form-control">
                @error('connection_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <input type="text" name="status" id="status"
                    value="{{ isset($keyboards->status) ? $keyboards->status : '' }}" class="form-control">
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Ubicación</label>
                <input type="text" name="location" id="location"
                    value="{{ isset($keyboards->location) ? $keyboards->location : '' }}" class="form-control">
                @error('location')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ $modo }} DATOS</button>
            <a href="{{ url('keyboards/') }}" class="btn btn-danger">Regresar</a>
        </form>
    </div>

    <!-- Agregar el enlace al archivo JavaScript de Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
