@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title mb-0">Equipments</h1>
        </div>
        <div class="card-body">
        <div class="row">
                <div class="col-md-4">
                    <img src="https://ramonnevarez.files.wordpress.com/2014/05/pc-escritorio.jpg" class="card-img-top" alt="Mouse Image" width="150" height="350">
                </div>
                <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>ID:</strong>
                    <span>{{ $equipments->id }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Número de serie:</strong>
                    <span>{{ $equipments->serial_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Status:</strong>
                    <span>{{ $equipments->status }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>QR:</strong>
                    <span>{{ $equipments->QR }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>keyboard:</strong>
                    <span>{{ $equipments->keyboard_serial_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>mouse:</strong>
                    <span>{{ $equipments->mouse_serial_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Monitor:</strong>
                    <span>{{ $equipments->monitor_serial_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Ordenador:</strong>
                    <span>{{ $equipments->ordenador_serial_number }}</span>
                </li>
                
            </ul>
        </div>
        </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('equipments.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
