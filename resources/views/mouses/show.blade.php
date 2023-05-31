@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title mb-0">mouse</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://www.officedepot.com.mx/medias/100005491.jpg-1200ftw?context=bWFzdGVyfHJvb3R8MzA2MDc4fGltYWdlL2pwZWd8aDczL2g2Yi8xMDI0NjAwMDU0MTcyNi8xMDAwMDU0OTEuanBnXzEyMDBmdHd8OGUxY2IyMzBiOGMxYjM4ZWMxODJlYmEwMjljMzJiMDdjYzI5M2EyOGIyYzI3OGY4ZmJlOGI4MDgzMDJkNjVjZQ" class="card-img-top" alt="Mouse Image" width="150" height="290">
                </div>
                <div class="col-md-8">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>ID:</strong>
                            <span>{{ $mouse->id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Número de serie:</strong>
                            <span>{{ $mouse->serial_number }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Modelo:</strong>
                            <span>{{ $mouse->model }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Brand:</strong>
                            <span>{{ $mouse->brand }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Connection type:</strong>
                            <span>{{ $mouse->connection_type }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Status:</strong>
                            <span>{{ $mouse->status }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Location:</strong>
                            <span>{{ $mouse->location }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('mouses.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
