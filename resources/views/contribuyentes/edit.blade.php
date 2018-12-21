@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Actualizar contribuyente</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="content">
		<div class="col-md-12 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('contribuyentes.update',$contribuyentes->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							
								
									<div class="form-group">
										<label for="razonSocial">Nombre o razón social</label>
										<input type="text" name="razonSocial" id="razonSocial" class="form-control input-sm" placeholder="Nombre o razón social" value="{{$contribuyentes->razonSocial}}">
									</div>
								
								
									<div class="form-group">
										<label for="RFC">RFC</label>
										<input type="text" name="RFC" id="RFC" minlength="13" maxlength="13" class="form-control input-sm" value="{{$contribuyentes->RFC}}" placeholder="Ingresa RFC">
									</div>
							

									<div class="form-group">
										<label for="correo_Electronico">Correo electrónico</label>
										<input type="email" name="correo_Electronico" id="correo_Electronico" class="form-control input-sm" value="{{$contribuyentes->correo_Electronico}}" placeholder="Ingresa tu correo electrónico">
									</div>
							

							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('contribuyentes.index') }}" class="btn btn-info btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>



            
            </div>
        </div>
    </div>
</div>
</div>
	
	@endsection