@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title mb-0">Keyboard</h1>
        </div>
        <div class="card-body">
        <div class="row">
                <div class="col-md-4">
                    <img src="https://res.cloudinary.com/rsc/image/upload/b_rgb:FFFFFF,c_pad,dpr_1.0,f_auto,h_758,q_auto,w_1350/c_pad,h_758,w_1350/F7950930-01?pgw=1&pgwact=1" class="card-img-top" alt="Mouse Image" width="150" height="250">
                </div>
                <div class="col-md-8">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>ID:</strong>
                    <span>{{ $keyboard->id }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Número de serie:</strong>
                    <span>{{ $keyboard->serial_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Modelo:</strong>
                    <span>{{ $keyboard->model }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Brand:</strong>
                    <span>{{ $keyboard->brand }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Connection type:</strong>
                    <span>{{ $keyboard->connection_type }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Status:</strong>
                    <span>{{ $keyboard->status }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Location:</strong>
                    <span>{{ $keyboard->location }}</span>
                </li>
                
            </ul>
        </div>
        </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('keyboards.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
