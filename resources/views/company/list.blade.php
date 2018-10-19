@extends('master')

@section('content')

    <h3>Lista de Empresas</h3>
    <br>
   <div class="page-header">
   </div>

   <div class="row">
     <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <p class="navbar-text navbar-right" style=" margin-top: 1px;">
              <a href="crear-empresa" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;"> Nueva </a>
              
            </p>
          </div>
          <div class="panel-body">

             <table class="table table-bordered table-hover">
               <thead>
                  <th>Nombre</th>
                  <th>Razon Social</th>
                  <th>Cuit</th>
                  <th>#</th>
               </thead>
               <tbody>
                @foreach($companies as $company)
                  <tr>
                     <td>{{$company->name}}</td>
                     <td>{{$company->businessName}}</td>
                     <td>{{$company->cuit}}</td>
                     <td><a href="empresas/{{$company->id}}/clientes"> Ver clientes</a></td>
                  </tr>
                @endforeach  
               </tbody>
             </table>
             {{ $companies->links() }}


          </div>
        </div>
     </div>
   </div>


@endsection