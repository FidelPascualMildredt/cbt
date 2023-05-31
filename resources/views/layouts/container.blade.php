
@extends('layouts.app2')

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Inventario</h1>
    
</div>

<div class="container-fluid">


<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 ">
                            <img src="https://www.officedepot.com.mx/medias/100005491.jpg-1200ftw?context=bWFzdGVyfHJvb3R8MzA2MDc4fGltYWdlL2pwZWd8aDczL2g2Yi8xMDI0NjAwMDU0MTcyNi8xMDAwMDU0OTEuanBnXzEyMDBmdHd8OGUxY2IyMzBiOGMxYjM4ZWMxODJlYmEwMjljMzJiMDdjYzI5M2EyOGIyYzI3OGY4ZmJlOGI4MDgzMDJkNjVjZQ" class="card-img-top" width="150" height="250">
                                <div class="card-body ">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 ">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MOUSE REGISTRADOS
                                                <h2>{{ $mouse }}</h2>
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                            <img src="https://ramonnevarez.files.wordpress.com/2014/05/pc-escritorio.jpg" class="card-img-top" width="150" height="250">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                EQUIPOS REGISTRADOS
                                            <h2>{{ $equipment }}</h2>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <img src="https://res.cloudinary.com/rsc/image/upload/b_rgb:FFFFFF,c_pad,dpr_1.0,f_auto,h_758,q_auto,w_1350/c_pad,h_758,w_1350/F7950930-01?pgw=1&pgwact=1" class="card-img-top" width="150" height="250">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TECLADOS REGISTRADOS
                                            <h2>{{ $keyboard }}</h2>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                            <img src="https://www.officedepot.com.mx/medias/100057709.jpg-1200ftw?context=bWFzdGVyfHJvb3R8MjU5MzEyfGltYWdlL2pwZWd8aGYyL2hlOC8xMDI1MDk4Mjk0ODg5NC8xMDAwNTc3MDkuanBnXzEyMDBmdHd8ZDFiM2Q0NjFlYmY1NDRiOGY3OWRhZWQ2YTllNDhkMGExODhhNjY5ZTJjYjBlOGZjZjkwNzNiYTg2YmNlMTI2ZA" class="card-img-top" width="150" height="250">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                MONITORES REGISTRADOS</div>
                                           <h2>{{ $monitor }}</h2>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>


    <div class="row">
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                            <img src="https://images.milanuncios.com/api/v1/ma-ad-media-pro/images/74b3c4e2-821b-4f05-953c-b5b816d323a7?rule=hw396_70" class="card-img-top" width="150" height="250">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                ORDENADORES REGISTRADOS</div>
                                            <h2>{{ $ordenador }}</h2>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                      

                        </div>


                        
                        
                        @endsection