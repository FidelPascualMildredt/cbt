@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title mb-0">Ordenador</h1>
        </div>
        <div class="card-body">
        <div class="row">
                <div class="col-md-4">
                    <img src="https://images.milanuncios.com/api/v1/ma-ad-media-pro/images/74b3c4e2-821b-4f05-953c-b5b816d323a7?rule=hw396_70" class="card-img-top" alt="Mouse Image" width="150" height="350">
                </div>
                <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>ID:</strong>
                    <span>{{ $ordenador->id }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Número de serie:</strong>
                    <span>{{ $ordenador->serial_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Modelo:</strong>
                    <span>{{ $ordenador->model }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Marca:</strong>
                    <span>{{ $ordenador->brand }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>RAM:</strong>
                    <span>{{ $ordenador->ram }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Procesador:</strong>
                    <span>{{ $ordenador->processor }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Disco Duro:</strong>
                    <span>{{ $ordenador->hard_disk }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Conexión de Red:</strong>
                    <span>{{ $ordenador->network_connection }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Ubicación:</strong>
                    <span>{{ $ordenador->location }}</span>
                </li>
            </ul>
        </div>
        </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('ordenadores.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
