<!DOCTYPE html>
<html>
<head>
    <title>Inventario full</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .cbt-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .inventory-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .school-name {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="position-absolute top-0 end-0">
            <div class="text-center mt-4">
                <div class="text-start">
                    <p class="h6"><b>Fecha:</b> {{ now()->setTimezone('America/Chihuahua')->isoFormat('L LT') }}</p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h1 class="cbt-title mx-center">CBT No.2 Ing. Juan Celada Salmón, Lerma</h1>
            <h2 class="inventory-title">Inventario de Equipos</h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Número de Serie</th>
                    <th>Estado</th>
                    <th>No. Serie del Teclado</th>
                    <th>No. Serie del Mouse</th>
                    <th>No. Serie del Monitor</th>
                    <th>No. Serie del Ordenador</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipments as $equipment)
                    <tr>
                        <td>{{ $equipment->serial_number }}</td>
                        <td>{{ $equipment->status }}</td>
                        <td>{{ $equipment->keyboard_serial_number }}</td>
                        <td>{{ $equipment->mouse_serial_number }}</td>
                        <td>{{ $equipment->monitor_serial_number }}</td>
                        <td>{{ $equipment->ordenador_serial_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
