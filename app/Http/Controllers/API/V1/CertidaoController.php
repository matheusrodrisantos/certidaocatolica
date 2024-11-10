<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\StoreCertidaoRequest;
use App\Http\Requests\UpdateCertidaoRequest;
use App\Http\Resources\CertidaoResource;
use App\Models\Certidao;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;

class CertidaoController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CertidaoResource::collection(Certidao::with('paroquia')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertidaoRequest $request)
    {
        
        $certidaoRequest=$request->validated();
        
        try{
            $certidao = new Certidao();

            $certidao->data_batismo=$certidaoRequest['data_batismo'];
            $certidao->celebrante=$certidaoRequest['celebrante'];
            $certidao->batizando=$certidaoRequest['batizando'];
            $certidao->data_nascimento=$certidaoRequest['data_nascimento'];
            $certidao->nome_pai=$certidaoRequest['nome_pai'];
            $certidao->nome_mae=$certidaoRequest['nome_mae'];
            $certidao->livro=$certidaoRequest['livro'];
            $certidao->folha=$certidaoRequest['folha'];
            $certidao->numero=$certidaoRequest['numero'];
            $certidao->paroco=$certidaoRequest['paroco'];
            $certidao->paroquia_id=$certidaoRequest['paroquia_id'];

            $certidao->save();

            return $this->response(
                'Certidão cadastrada com sucesso!',200,
                new CertidaoResource($certidao::with('paroquia')->get()->last())
            );

        }catch(\Exception $e){
            $error[]=$e->getMessage();
            return $this->error('Data invalid',422,$error);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Certidao $certidao)
    {
        $certidao->load('paroquia');
        return new CertidaoResource($certidao);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertidaoRequest $request, Certidao $certidao)
    {
        try{
            $certidaoRequest= $request->validated();
            $updated=$certidao->update([
                    $certidao['data_batismo']=$certidaoRequest['data_batismo'],
                    $certidao['celebrante']=$certidaoRequest['celebrante'],
                    $certidao['batizando']=$certidaoRequest['batizando'],
                    $certidao['data_nascimento']=$certidaoRequest['data_nascimento'],
                    $certidao['nome_mae']=$certidaoRequest['nome_mae'],
                    $certidao['nome_pai']=$certidaoRequest['nome_pai'],
                    $certidao['livro']=$certidaoRequest['livro'],
                    $certidao['folha']=$certidaoRequest['folha'],
                    $certidao['numero']=$certidaoRequest['numero'],
                    $certidao['paroco']=$certidaoRequest['paroco'],
                    $certidao['paroquia_id']=$certidaoRequest['paroquia_id']
            ]);

            if($updated){
                return $this->response(
                    'Certidão atualizada com sucesso!',200,
                    new CertidaoResource($certidao::with('paroquia')->get()->last())
                );
            }
        }catch(\Exception $e){
            $error[]=$e->getMessage();
            return $this->error('Data invalid',422,$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certidao $certidao)
    {
        //
    }
}
