@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title mb-0">Monitor</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://www.officedepot.com.mx/medias/100057709.jpg-1200ftw?context=bWFzdGVyfHJvb3R8MjU5MzEyfGltYWdlL2pwZWd8aGYyL2hlOC8xMDI1MDk4Mjk0ODg5NC8xMDAwNTc3MDkuanBnXzEyMDBmdHd8ZDFiM2Q0NjFlYmY1NDRiOGY3OWRhZWQ2YTllNDhkMGExODhhNjY5ZTJjYjBlOGZjZjkwNzNiYTg2YmNlMTI2ZA" class="card-img-top" alt="Mouse Image" width="150" height="350">
                </div>
                <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>ID:</strong>
                    <span>{{ $monitor->id }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Número de serie:</strong>
                    <span>{{ $monitor->serial_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Modelo:</strong>
                    <span>{{ $monitor->model }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Brand:</strong>
                    <span>{{ $monitor->brand }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Connection type:</strong>
                    <span>{{ $monitor->connection_type }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Screen Type:</strong>
                    <span>{{ $monitor->screen_type }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Status:</strong>
                    <span>{{ $monitor->status }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Location:</strong>
                    <span>{{ $monitor->location }}</span>
                </li>
                
            </ul>
        </div>
        </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('monitors.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
