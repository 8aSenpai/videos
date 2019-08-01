@extends('general.preset')
@section('title')
Bandeja
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row dashboard">
                <div class="dash_title">
                     <h3>Mas Recientes</h3>
                </div>
                <div class="dash_content">
                    @foreach($videos as $video)
                    <div class="col-xs-4 dash_video">
                        <div class="col-xs-12">
                            <a href="{{ route('video', ['id'=>$video->id_video])}}"><img src="/uploads/thumbnails/{{ $video->thumbnail }}" alt="" height="100" width="200"></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><h5>{{ $video->name }}</h5></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><span class="dash_subido">Usuario</span></a>
                        </div>
                        <div class="col-xs-12 dash_views">
                            Vistas:22k Subido: 2017/07/10
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
            <div class="row dashboard">
                <div class="dash_title">
                     <h3>Mas populares</h3>
                </div>
                <div class="dash_content">
                    <div class="col-xs-4 dash_video">
                        <div class="col-xs-12">
                            <a href="#"><img src="{{ asset('images/thumb.jpg') }}" alt="" height="100" width="200"></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><h5>Titulo del video de prueba</h5></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><span class="dash_subido">Usuario</span></a>
                        </div>
                        <div class="col-xs-12 dash_views">
                            Vistas:22k Subido: 2017/07/10
                        </div>
                    </div> 
                    <div class="col-xs-4 dash_video">
                        <div class="col-xs-12">
                            <a href="#"><img src="{{ asset('images/thumb.jpg') }}" alt="" height="100" width="200"></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><h5>Titulo del video de prueba</h5></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><span class="dash_subido">Usuario</span></a>
                        </div>
                        <div class="col-xs-12 dash_views">
                            Vistas:22k Subido: 2017/07/10
                        </div>
                    </div> 
                    <div class="col-xs-4 dash_video">
                        <div class="col-xs-12">
                            <a href="#"><img src="{{ asset('images/thumb.jpg') }}" alt="" height="100" width="200"></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><h5>Titulo del video de prueba</h5></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><span class="dash_subido">Usuario</span></a>
                        </div>
                        <div class="col-xs-12 dash_views">
                            Vistas:22k Subido: 2017/07/10
                        </div>
                    </div>
                    <div class="col-xs-4 dash_video">
                        <div class="col-xs-12">
                            <a href="#"><img src="{{ asset('images/thumb.jpg') }}" alt="" height="100" width="200"></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><h5>Titulo del video de prueba</h5></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><span class="dash_subido">Usuario</span></a>
                        </div>
                        <div class="col-xs-12 dash_views">
                            Vistas:22k Subido: 2017/07/10
                        </div>
                    </div> 
                    <div class="col-xs-4 dash_video">
                        <div class="col-xs-12">
                            <a href="#"><img src="{{ asset('images/thumb.jpg') }}" alt="" height="100" width="200"></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><h5>Titulo del video de prueba</h5></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><span class="dash_subido">Usuario</span></a>
                        </div>
                        <div class="col-xs-12 dash_views">
                            Vistas:22k Subido: 2017/07/10
                        </div>
                    </div> 
                    <div class="col-xs-4 dash_video">
                        <div class="col-xs-12">
                            <a href="#"><img src="{{ asset('images/thumb.jpg') }}" alt="" height="100" width="200"></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><h5>Titulo del video de prueba</h5></a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#"><span class="dash_subido">Usuario</span></a>
                        </div>
                        <div class="col-xs-12 dash_views">
                            Vistas:22k Subido: 2017/07/10
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
