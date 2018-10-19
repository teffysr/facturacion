@extends('master')

@section('content')

   <h3>Lista de Facturas</h3>
    <br>
   <div class="page-header">
   </div>

   <div class="row">
     <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <p class="navbar-text navbar-right" style=" margin-top: 1px;">
              <a href="crear-facturas{{$client?'?client='.$client:''}}" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</a>
            </p>
           </div>
          <div class="panel-body">

             <table class="table table-bordered table-hover">
               <thead>
                  <th>Numero de Factura</th>
                  <th>Sub-Total</th>
                  <th>IVA</th>
                  <th>Total</th>
                  <th>Cliente</th>
                  <th>Empresa</th>
                  <th>#</th>
               </thead>
               <tbody>
                @foreach($invoices as $invoice)
                  <tr>
                     <td>{{$invoice->number}}</td>
                     <td>{{$invoice->subTotal}}</td>
                     <td>{{$invoice->iva}}</td>
                     <td>{{$invoice->total}}</td>
                     <td>{{$invoice->client}}</td>
                     <td>{{$invoice->company}}</td>
                     <td><a href="{{url('editar/'.$invoice->id)}}">Editar</a></td>
                  </tr>
                  @endforeach
               </tbody>
             </table>
              {{ $invoices->links() }}

          </div>
        </div>
     </div>
   </div>


@endsection