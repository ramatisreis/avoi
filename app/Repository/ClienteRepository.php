<?php

namespace App\Repository;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteRepository
{


    public function inserir(array $data)
    {
        DB::transaction(function () use ($data) {
            $cliente = new Cliente();
            $cliente->nome_cliente = $data['nome_cliente'];
            $cliente->galc = $data['galc'];
            $cliente->porta = $data['porta'];
            $cliente->endereco_instalacao = $data['endereco_instalacao'];
            $cliente->velocidade = $data['velocidade'];
            $cliente->excluido = 0;
            $cliente->save();
        });
    }

    public function atualizar(array $data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $cliente = Cliente::where('excluido', 0)
                ->where('id_cliente', $id);
            $cliente->update($data);
        });
    }

    public function obterTodos()
    {
        $rt = DB::transaction(function () {
            return Cliente::where('excluido', 0)
                ->orderBy('id_cliente', 'asc')->get();
        });

        return $rt;
    }

    public function obter($id)
    {
        $rt = DB::transaction(function () use ($id) {
            return Cliente::where('excluido', 0)
                ->where('id_cliente', $id)
                ->orderBy('id_cliente', 'asc')->get();
        });

        return $rt;
    }

    public function deletar($id)
    {
        DB::transaction(function () use ($id) {
            $cliente = Cliente::where('excluido', 0)
                ->where('id_cliente', $id);
            $cliente->update(['excluido' => 1]);
        });
    }
}
