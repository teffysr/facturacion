<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Client;
use Illuminate\Http\Request;
use Validator;

class InvoiceController extends Controller
{

    public function index($client = null)
    {
        $invoices = Invoice::select('invoice.id','invoice.number','invoice.total','invoice.subTotal','iva','client.name as client','company.name as company')
        ->join('client','client.id','=','invoice.client_id')
        ->join('company','company.id','=','invoice.company_id');
        if(!empty($client)){
            $invoices->where('client.id',$client);
        }
         $in = $invoices->paginate(5);
        return view('invoice.list', ['invoices' => $in,'client'=>$client]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($company = null, $client)
    { 
        $invoices = Invoice::select('invoice.id','invoice.number','invoice.total','invoice.subTotal','iva','client.name as client','company.name as company')
        ->join('client','client.id','=','invoice.client_id')
        ->join('company','company.id','=','invoice.company_id')
        ->where('client.id',$client)
        ->paginate(5);
        return view('invoice.list', ['invoices' => $invoices,'client'=>$client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company = null,$client = null,Request $request)
    {
        $clients = null;
        if(is_null($client)||is_null($company)){
            $client = $request->get('client');
        }
        if(is_null($client)){
            $clients = Client::all();
        }

        return view('invoice.create',['client' => $client, 'company'=>$company, 'clients'=>$clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($company = null,$client = null,Request $request)
    {
        $validator = $this->validateInvoice($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }else{
            $company_id = Client::select('client.company_id')->where('id',$request->get('client'))->first();

            $invoice = new Invoice;
            $invoice->number = $request->get('number');
            $invoice->subTotal = $request->get('subTotal');
            $invoice->total = $request->get('total');
            $invoice->iva = $request->get('iva');
            $invoice->company_id = $company_id->company_id;
            $invoice->client_id = !is_null($client)?$client:$request->get('client');
            $invoice->save();

            return redirect('facturas');
            }
        
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::where('id', $id)->get()->first();
        $clients = Client::all();
        return view('invoice.edit',['clients'=>$clients, 'invoice' => $invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $validator = $this->validateInvoice($request);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }else{

            $company_id = Client::select('client.company_id')->where('id',$request->get('client'))->first();
            $invoice = Invoice::where('id', $id)->get()->first();

            $invoice->number = $request->get('number');
            $invoice->subTotal = $request->get('subTotal');
            $invoice->total = $request->get('total');
            $invoice->iva = $request->get('iva');
            $invoice->company_id = $company_id->company_id;
            $invoice->client_id = $request->get('client');
            $invoice->save();

            return redirect('facturas');
        }
    }

    public function validateInvoice($request)
    {
        $rules = [
            'number' => 'required|max:255',
            'subTotal' => 'required|numeric|',
            'iva' => 'required|numeric',
            'total' => 'required|numeric|',
        ];

        $messages = [
            'number.required' => 'El campo Número de Factura  es requerido',
            'subTotal.required' => 'El campo subtotal es requerido',
            'iva.required' => 'El campo iva es requerido',
            'total.required' => 'El campo total es requerido',
            'subTotal.numeric' => 'El campo subtotal solo admite numeros',
            'iva.numeric' => 'El campo iva solo admite numeros',
            'total.numeric' => 'El campo total solo admite numeros',
        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        return $validator;
    }
}
