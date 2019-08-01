@extends('general.preset')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default">
                <div class="panel-heading">Editar Perfil</div>
                <div class="panel-body">
                <form action="/mi_cuenta" enctype="multipart/form-data" method="POST">
                	<div class="col-xs-4">
		                <div class="col-xs-12" style="text-align: center;">
		                	<img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="" width="100" height="100">
		                </div>
		                <div class="col-xs-12 avatar_file" style="text-align: center;"> 
							<label for="avatar" class="avatar_label">Subir Nueva</label>
		                	<input type="file" name="avatar" id="file" class="inputfile"> 
		                </div>
	                </div> 
		            <div class="col-xs-6">
		            	<div class="col-xs-12">
		                	<label for="nick">Nombre de usuario:</label>
		                	<input class="input_disabled" type="text" name="nick" disabled="true"  value="{{ Auth::user()->nick }}">
		                </div>
		                <div class="col-xs-12">
		                	<label for="nombre">Nombre:</label>
		                </div>
		                <div class="col-xs-12">
		                	<input type="text" name="nombre" value="{{ Auth::user()->name }}""> 
		                </div>
		                <div class="col-xs-12">
		                	<label for="email">Correo Electronico:</label>
		                </div>
		                <div class="col-xs-12">
		                	<input type="text" name="email" value="{{ Auth::user()->email }}""> 
		                </div>
		                <div class="col-xs-12" style="text-align: center;">
		                	<button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
		                </div>
		            </div>
		            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection