<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Traits\HttpResponses;

use Exception;

class PedidoController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidoRequest $request)
    {
        $pedidoRequest= $request->validated();
        try{
            $pedido = new Pedido();

            $pedido->nome_completo=$pedidoRequest['nome_completo'];
            $pedido->nome_mae=$pedidoRequest['nome_mae'];
            $pedido->email=$pedidoRequest['email'];
            $pedido->data_nascimento=$pedidoRequest['data_nascimento'];
            $pedido->data_batismo=$pedidoRequest['data_batismo'];
            $pedido->finalidade=$pedidoRequest['finalidade'];

            $pedido->diocese_id=$pedidoRequest['diocese_id'];
            $pedido->cidade_id=$pedidoRequest['cidade_id'];
            $pedido->paroquia_id=$pedidoRequest['paroquia_id'];
            
             $pedido->save();

        }catch(Exception $e){

            $error[]=$e->getMessage();
            return $this->error('Data invalid',422,$error);
        
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $Pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $Pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepedidoRequest $request, Pedido $Pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $Pedido)
    {
        //
    }
}
