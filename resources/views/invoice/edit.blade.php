@extends('master')

@section('title','Nueva Factura')

@section('content')

   <div class="page-header">
     
   </div>

   <div class="row">
     <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading">
           </div>
          <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{url('update/'.$invoice->id)}}">
              @method('POST')
              @csrf
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="number">Número de Factura</label>
                  <input type="text" name="number" class="form-control" id="number" placeholder="1xxx-xxxxx1" value="{{ $invoice->number }}">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="subtotal">Subtotal</label>
                  <input type="text" name="subTotal" class="form-control" id="subtotal" placeholder="1000.00" value="{{ $invoice->subTotal }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="iva">IVA</label>
                  <input type="text" name="iva" class="form-control" id="iva" placeholder="21" value="{{ $invoice->iva }}">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="total">Total</label>
                  <input type="text" name="total" class="form-control" id="total" placeholder="1210.00" value="{{ $invoice->total }}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  @if(!empty($clients))
                    <label for="client">Clientes</label>
                    <select class="form-control" name="client">
                        @foreach($clients as $c)
                          <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach 
                    </select>
                  @endif 
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>                
          </div>
        </div>
     </div>
   </div>


@endsection