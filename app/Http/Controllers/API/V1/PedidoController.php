<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Traits\HttpResponses;


use App\Http\Controllers\MailController;
use App\Http\Resources\PedidoResource;

use Illuminate\Http\Request;
use Exception;

class PedidoController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PedidoResource::collection(Pedido::all());   
    }


    public function show($paroquia_id)
    {
        $pedidos = PedidoResource::collection(
            Pedido::where('paroquia_id','=',$paroquia_id)->get()
        );
        
        return $pedidos; 
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
            
            $saved=$pedido->save();
            
            if($saved){
                MailController::sendEmail($pedido->email,
                    'Solicitacao feita',
                    $pedido->finalidade,
                    $pedido->nome_completo, "confirmation"
                );
                return $this->response( 
                    'Solicitação feita com sucesso!',200,
                    new PedidoResource($pedido->get()->last())
                );
            }

        }catch(Exception $e){

            $error[]=$e->getMessage();
            return $this->error('Data invalid',422,$error);
        
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        $pedidoRequest=$request->validated();
        try{
            
            $oldStatus=$pedido->get()->last()->status;
            $updated=$pedido->update([
                'nome_completo'=>$pedidoRequest['nome_completo'],
                'nome_mae'=>$pedidoRequest['nome_mae'],
                'email'=>$pedidoRequest['email'],
                'data_nascimento'=>$pedidoRequest['data_nascimento'],
                'data_batismo'=>$pedidoRequest['data_batismo'],
                'finalidade'=>$pedidoRequest['finalidade'],
                'status'=>$pedidoRequest['status'],
                'diocese_id'=>$pedidoRequest['diocese_id']?$pedidoRequest['diocese_id']:null,
                'cidade_id'=>$pedidoRequest['cidade_id']?$pedidoRequest['cidade_id']:null,
                'paroquia_id'=>$pedidoRequest['paroquia_id']?$pedidoRequest['paroquia_id']:null
            ]);
        
            
            if($updated){
                $newStatus=$pedido->get()->last()->status;    

                if($oldStatus!=$newStatus and $newStatus=="aprovado"){

                    MailController::sendEmail(
                        $pedido->email,
                        'Solicitacao aprovada',
                        $pedido->finalidade,
                        $pedido->nome,
                        "approved"
                    );
                    return json_encode($updated);
                }

                if($oldStatus!=$newStatus and $newStatus=="pagamento pendente"){

                    MailController::sendEmail($pedido->email,
                    'Pagamento pendente',
                    $pedido->finalidade,
                    $pedido->nome,
                    "pending"
                    );
                    return json_encode($updated);
                }
                return $this->response(
                    'Pedido atualizado com sucesso!',200
                );
            }
        }catch(Exception $e){
            return $this->error($e->getMessage(),400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $Pedido)
    {
        //
    }

    public function upload(Request $request,$id){
     
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png'
        ]);
        if($request->file('file')->isValid()){

            $path = $request->file('file')->store('uploads');

            
            
            $pedido = new PedidoResource(
                Pedido::where('id',$id)->first()
            );
                
            MailController::sendEmail($pedido->email,
            'Solicitacao aprovada',
            $pedido->finalidade,
            $pedido->nome_completo, 
            "approved",
            $path
            );
            return $this->response( 
            'Solicitação feita com sucesso!',200,
            new PedidoResource($pedido->get()->last())
            );
        }


    }
}
