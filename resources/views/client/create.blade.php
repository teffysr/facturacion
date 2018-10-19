@extends('master')

@section('title','Nuevo cliente')

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
            <form method="POST" action="store-cliente">
              @method('POST')
              @csrf

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del cliente" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="cuit">Cuit/Cuil</label>
                  <input type="text" name="cuit" class="form-control" id="cuit" placeholder="27XXXXXXXX6" value="{{ old('cuit') }}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  @if(empty($company))
                    <label for="company">Empresa</label>
                    <select class="form-control" name="company">
                        @foreach($companies as $c)
                          <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach 
                    </select>
                  @endif 
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Grabar</button>
            </form>                
          </div>
        </div>
     </div>
   </div>


@endsection