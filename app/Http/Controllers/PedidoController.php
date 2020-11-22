<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function listarClientes()
    {
        try {
            $clientes = $this->clienteService->obterTodos();

            return view('avoi.cliente.listar', compact('clientes'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }


    public function editarCliente(Request $request)
    {
        try {
            $data = $request->all();
            $cliente = $this->clienteService->obter($data['id_cliente']);

            return view('avoi.cliente.editar', compact('cliente'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }

    public function editarClienteDo(Request $request)
    {
        try {
            $data = $request->except(array('_method', '_token'));

            $this->clienteService->atualizar($data, $data['id_cliente']);

            return redirect()->route('cliente.editar')->with('messagemSucesso', 'Cliente atualizado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }

    public function cadastrarCliente()
    {
        try {
            return view('avoi.cliente.cadastrar');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function cadastrarClienteDo(Request $request)
    {
        try {
            $data = $request->except(array('_method', '_token'));

            $this->clienteService->inserir($data);

            return redirect()->route('cliente.cadastrar')->with('messagemSucesso', 'Cliente cadastrado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }

    public function deletePedidoDo($id)
    {
        try {
            $this->clienteService->deletar($id);
            return redirect()->route('cliente.listar')->with('messagemSucesso', 'Cliente excluido com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }
}
