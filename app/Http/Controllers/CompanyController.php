<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('name')->paginate(7);
        return view('company.list', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateCompany($request);

        if ($validator->fails()) {
            return redirect('crear-empresa')
                        ->withErrors($validator)
                        ->withInput();
        }else{
        $company = new Company;
        $company->name = $request->get('name');
        $company->businessName = $request->get('businessName');
        $company->cuit = $request->get('cuit');
        $company->save();

        return redirect()->action('CompanyController@index');
        }

    }

    private function validateCompany($request){

        $rules = [
            'name' => 'required|max:255',
            'businessName' => 'required',
            'cuit' => 'required|numeric|digits_between:1,11'
        ];

        $messages = [
            'name.required' => 'El campo Nombre es requerido',
            'businessName.required' => 'El campo Razon Social es requerido',
            'cuit.required' => 'El campo cuit es requerido',
            'cuit.numeric' => 'El campo cuit solo admite numeros',
            'cuit.digits_between' => 'El cuit no puede ser mayor que 11 digitos'
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        $validator->after(function ($validator) use ($request) {

            if($request->get('cuit')){
               $company = Company::where('cuit', $request->get('cuit'))->first();

                if ($company) {
                    $validator->errors()->add('cuit', 'Ya existe una Empresa con cuit N°: '.$request->get('cuit'));
                } 
            }
            
        });

        return $validator;
    }
}
