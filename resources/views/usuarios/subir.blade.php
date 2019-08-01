@extends('general.preset')
@section('title')
Subir video
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Video</div>
                <div class="panel-body">
                @if(isset($status))
	                <div class="col-12-md" style="background: #00AD18; color: white; width: 100%; text-align: center;"> 
                		<span ><h3>TU VIDEO DE HA SUBIDO CORRECTAMENTE!!!</h3><span>
					</div>
				@endif

                <form action="/subir" enctype="multipart/form-data" method="POST" id="uploading">
					<div class="col-xs-12">
                		<label for="titulo">Titulo: </label>
                	</div>
                	<div class="col-xs-12">
                		<input type="text" name="titulo" required autofocus style="width: 100%;"> 
                	</div>
                	<div class="col-xs-12">
                		<label for="descripcion">Descripcion: </label>
                	</div>
                	<div class="col-xs-12">
                		<textarea style="width: 100%; margin-bottom: 30px; color: black;" name="descripcion" id="descripcion" cols="50" rows="10" required autofocus></textarea> 
                	</div>   
                    <div class="col-xs-12">
                        <label for="tags">TAGS:</label>
                    </div>
                    <div class="col-xs-12"> 
                        <input name="tags" class="tags" type="text" value="" data-role="tagsinput" required autofocus> 
                    </div>
                	<div class="col-xs-6" style="text-align: center; margin-top: 25px;">   
	                		<span>Seleccionar: </span> 
							<label for="thumbnail" class="avatar_label">THUMBNAIL</label>
			                <input type="file" name="thumbnail" id="file" class="inputfile" required autofocus>  
			        </div> 
			        <div class="col-xs-6" style="text-align: center; margin-top: 25px;"> 
			        	<span>Seleccionar: </span> 
                            <label for="video" class="avatar_label">VIDEO</label>
                            <input type="file" name="video" id="file" class="inputfile" required autofocus> 
			        </div>
			        <div class="col-xs-12" style="text-align: center;">
			        	<button type="submit" class="btn btn-primary">
                            Subir
                        </button>
			        </div>
                    <div class="col-xs-12"> 
                    <div class="loader" style="text-align: center;"><img src="{{ asset('images/load.gif') }}"></div>
                    </div>
			        <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/tags/dist/bootstrap-tagsinput.min.js') }}"></script> 
<script src="{{ asset('js/load.js') }}"></script> 
@endsection