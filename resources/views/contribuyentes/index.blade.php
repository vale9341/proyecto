@extends('layouts.app')
@section('content')


<style type="text/css">
  .table {
    border-top: 2px solid #ccc;
  }
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>Lista de Contribuyentes</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="content">
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            
                            <div class="pull-right">
                              <div class="btn-group">
                                <a href="{{ route('home') }}" class="btn btn-info" >Añadir contribuyente</a>
                              </div>
                            </div>
                            <br>
                            <div class="table-container">
                              <table id="mytable" class="table table-bordred table-striped">
                               <thead>
                                 <th>Razon social</th>
                                 <th>RFC</th>
                                 <th>Correo electrónico</th>
                                 <th>Editar</th>
                                 <th>Eliminar</th>
                               </thead>
                               <tbody>

                                @if($contribuyentes->count())  
                                @foreach($contribuyentes as $contribuyente)  
                                <tr>
                                  <td>{{$contribuyente->razonSocial}}</td>
                                  <td>{{$contribuyente->RFC}}</td>
                                  <td>{{$contribuyente->correo_Electronico}}</td>
                                  <td><a class="btn btn-warning btn-xs" href="{{action('contribuyenteController@edit', $contribuyente->id)}}" >Editar</a></td>
                                  <td>
                                    <form action="{{action('contribuyenteController@destroy', $contribuyente->id)}}" method="post">
                                     {{csrf_field()}}
                                     <input name="_method" type="hidden" value="DELETE">

                                     <button class="btn btn-danger btn-xs" type="submit">Eliminar</button>
                                   </form>
                                   </td>
                                 </tr>
                                 @endforeach 
                                 @else
                                 <tr>
                                  <td colspan="8">No hay registro !!</td>
                                </tr>
                                @endif
                              </tbody>

                            </table>
                          </div>
                        </div>
                        {{ $contribuyentes->links() }}
                      </div>
                    </div>
                  </section>

            
            </div>
        </div>
    </div>
</div>
</div>
  

@endsection