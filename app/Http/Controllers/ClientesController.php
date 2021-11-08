<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private $repository;

        public function __construct(Cliente $cliente)
        {
            $this->repository =$cliente;
        }
    public function index()
    {
        $clientes =$this->repository->paginate(10);

        return view('admin.pages.clientes.index', [
            'clientes' => $clientes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.pages.clientes.create');
        return true;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->repository->where('id', $id)->first();
        if (!$cliente)
            return redirect()->back();

        return view('admin.pages.clientes.show', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->repository->where('id', $id)->first();
        if (!$cliente)
            return redirect()->back();

        $cliente->delete();

        return redirect()->route('clientes.index');

    }

}
