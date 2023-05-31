<!DOCTYPE html>
<html>
<head>
    <title>{{ $modo }} equipments</title>
    <!-- Agregar los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   
</head>
<body>
    <div class="container mt-5">

        <h1>{{ $modo }} equipments</h1>

        <form action="{{ $modo == 'Crear' ? url('equipments') : url('equipments/' . $equipments->id) }}" method="POST">
            @csrf
            @if ($modo == 'Editar')
                @method('PUT')
            @endif

            <div class="form-group">
  <label for="serial_number">Número de serie</label> 
  <input type="text" name="serial_number" id="serial_number" class="form-control"
    value="{{ old('serial_number', isset($equipments->serial_number) ? $equipments->serial_number : '') }}">
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



            <!-- <div class="form-group">
                <label for="status">Estado:</label>
                <input type="text" name="status" id="status" class="form-control"
                    value="{{ old('status', isset($equipments->status) ? $equipments->status : '') }}">
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> -->

            <div class="form-group">
    <label for="status">Estado:</label>
    <input type="text" name="status" id="status" class="form-control"
        value="{{ old('status', isset($equipments->status) ? $equipments->status : '') }}">
    <div id="suggestions">
        <ul>
            <li>Act - Activo</li>
            <li>Des - Desactivo</li>
            <li>Rep - Reparación</li>
        </ul>
    </div>
    @error('status')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

                <script>
                    var input = document.getElementById('status');
                    var suggestions = document.getElementById('suggestions');
                
                    input.addEventListener('input', function(event) {
                        var value = event.target.value.toLowerCase();
                        var suggestion = '';
                    
                        if (value.substring(0, 3) === 'act') {
                            suggestion = 'Activo';
                        } else if (value.substring(0, 3) === 'des') {
                            suggestion = 'Desactivo';
                        } else if (value.substring(0, 3) === 'rep') {
                            suggestion = 'Reparación';
                        } else {
                            suggestion = value; // Mantener el valor ingresado por el usuario si no coincide con ninguna opción
                        }
                    
                        input.value = suggestion;
                    
                        // Muestra u oculta las sugerencias
                        if (value === '' || suggestion !== '') {
                            suggestions.style.display = 'none';
                        } else {
                            suggestions.style.display = 'block';
                        }
                    });
                </script>



<!-- 
            <div class="form-group">
                <label for="QR">Código QR:</label>
                <input type="text" name="QR" id="QR" class="form-control"
                    value="{{ old('QR', isset($equipments->QR) ? $equipments->QR : '') }}">
                @error('QR')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div> -->
            
            <div class="form-group">
                <label for="mouses_id">Mouse:</label>
                <select class="form-control" name="mouses_id">
                    <option>Selecciona el Mouse</option>
                    @foreach ($mouses as $mouse)
                        <option value="{{ $mouse->id }}"
                            {{ old('mouses_id', isset($equipments->mouses_id) && $equipments->mouses_id == $mouse->id ? 'selected' : '') }}>
                            {{ $mouse->serial_number }}</option>
                    @endforeach
                </select>
                @error('mouses_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ordenadores_id">Ordenador:</label>
                <select class="form-control" name="ordenadores_id">
                    <option>Selecciona el Ordenador</option>
                    @foreach ($ordenadores as $ordenador)
                        <option value="{{ $ordenador->id }}"
                            {{ old('ordenadores_id', isset($equipments->ordenadores_id) && $equipments->ordenadores_id == $ordenador->id ? 'selected' : '') }}>
                            {{ $ordenador->serial_number }}</option>
                    @endforeach
                </select>
                @error('ordenadores_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="keyboards_id">Teclado</label>
                <select class="form-control" name="keyboards_id">
                    <option>Selecciona el Teclado</option>
                    @foreach ($keyboards as $keyboard)
                        <option value="{{ $keyboard->id }}"
                            {{ old('keyboards_id', isset($equipments->keyboards_id) && $equipments->keyboards_id == $keyboard->id ? 'selected' : '') }}>
                            {{ $keyboard->serial_number }}</option>
                    @endforeach
                </select>
                @error('keyboards_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="monitors_id">Monitor</label>
                <select class="form-control" name="monitors_id">
                    <option>Selecciona el Monitor</option>
                    @foreach ($monitors as $monitor)
                        <option value="{{ $monitor->id }}"
                            {{ old('monitors_id', isset($equipments->monitors_id) && $equipments->monitors_id == $monitor->id ? 'selected' : '') }}>
                            {{ $monitor->serial_number }}</option>
                    @endforeach
                </select>
                @error('monitors_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ $modo }} DATOS</button>
            <a href="{{ url('equipments/') }}" class="btn btn-danger">Regresar</a>
        </form>
    </div>

    <!-- Agregar el enlace al archivo JavaScript de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>


