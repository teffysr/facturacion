@extends('master')

@section('title','Nueva Empresa')

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
            <form method="POST" action="store-empresa">
              @method('POST')
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre de la empresa" value="{{ old('name') }}">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="businessName">Razón Social</label>
                  <input type="text" name="businessName" class="form-control" id="businessName" placeholder="Razón Social" value="{{ old('businessName') }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="cuit">Cuit/Cuil</label>
                  <input type="text" name="cuit" class="form-control" id="cuit" placeholder="21" value="{{ old('cuit') }}">
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>                
          </div>
        </div>
     </div>
   </div>


@endsection