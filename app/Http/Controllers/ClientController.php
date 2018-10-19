<?php

namespace App\Http\Controllers;

use App\Client;
use App\Company;
use Illuminate\Http\Request;
use Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::select('client.id','client.name','client.cuit','company.name as company','client.id')->join('company','company.id','=','client.company_id')
        ->orderBy('client.name')
        ->paginate(5);

       return view('client.list', ['clients' => $clients,'company'=>null]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($company)
    {
        $clients = Client::select('client.id','client.name','client.cuit','company.name as company','client.id')->join('company','company.id','=','client.company_id')
        ->where('company.id',$company)
        ->orderBy('client.name')
        ->paginate(5);
        return view('client.list', ['clients' => $clients, 'company'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $companies = Company::select('company.name','company.id')->orderBy('company.name')->get();
        return view('client.create',['company'=>$request->get('company'), 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($company = null, Request $request)
    {
        $validator = $this->validateClient($request,$company);
        $route = 'empresas/'.$company.'/clientes';
        $validatorRoute = 'empresas/'.$company.'/crear-cliente';
        
        if(empty($company)) {
                $company = $request->get('company');
                $route = 'clientes';
                $validatorRoute = 'crear-cliente';
        }

        if ($validator->fails()) {
            return redirect($validatorRoute)
                        ->withErrors($validator)
                        ->withInput();
        }else{
           $client = new Client;
            $client->name = $request->get('name');
            $client->cuit = $request->get('cuit');
            $client->company_id = $company;
            $client->save();

            return redirect($route); 
        }   
    }

    private function validateClient($request,$company){

        $rules = [
            'name' => 'required|max:100',
            'cuit' => 'required|digits_between:1,11|numeric'
        ];

        $messages = [
            'name.required' => 'El campo Nombre es requerido',
            'name.max' => 'El Nombre no puede ser mayor que 100 caracteres',
            'cuit.required' => 'El campo cuit es requerido',
            'cuit.numeric' => 'El campo cuit solo admite numeros',
            'cuit.digits_between' => 'El cuit no puede ser mayor que 11 digitos',
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        $validator->after(function ($validator) use ($company, $request) {
           
            $client = Client::where('cuit', $request->get('cuit'))->first();

            if ($client) {
                $validator->errors()->add('cuit', 'Ya existe un Cliente con cuit N°: '.$request->get('cuit'));
            }
        });

        return $validator;
    }
}
