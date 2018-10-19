@extends('master')

@section('content')

   <h3>Lista de Clientes</h3>
    <br>
   <div class="page-header">
   </div>

   <div class="row">
     <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading">
              <p class="navbar-text navbar-right" style=" margin-top: 1px;">
                <a href="crear-cliente{{ $company?'?company='.$company:'' }}" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</a>
              </p>
           </div>
          <div class="panel-body">

             <table class="table table-bordered table-hover">
               <thead>
                  <th>Nombre</th>
                  <th>Cuit/Cuil</th>
                  <th>Empresa</th>
                  <th>#</th>
                  <th>#</th>
               </thead>
               <tbody>
                  @foreach($clients as $client)
                  <tr>
                     <td>{{$client->name}}</td>
                     <td>{{$client->cuit}}</td>
                     <td>{{$client->company}}</td>
                     <td>
                      <a href="clientes/{{$client->id}}/facturas"> Ver Facturas</a>
                     </td>
                     <td>
                      <a href="clientes/{{$client->id}}/crear-facturas?client={{$client->id}}"> Generar Facturas</a>
                     </td>
                  </tr>
                @endforeach  
               </tbody>
             </table>
              {{ $clients->links() }}

          </div>
        </div>
     </div>
   </div>


@endsection