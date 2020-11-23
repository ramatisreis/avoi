<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function listarClientesAtivos()
    {
        try {
            $clientes = $this->clienteService->obterTodosAtivos();

            return view('avoi.cliente.listarativos', compact('clientes'));
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }

    public function listarClientes()
    {
        try {
            $clientes = $this->clienteService->obterTodos();

            return view('avoi.cliente.listar', compact('clientes'));
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }


    public function editarCliente($id)
    {
        try {
            $cliente = $this->clienteService->obter($id)[0];

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

            return redirect()->route('cliente.listar')->with('messagemSucesso', 'Cliente atualizado com sucesso!');
        } catch (\Throwable $th) {
            /* dd($th);
            die; */
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

            return redirect()->route('cliente.listar')->with('messagemSucesso', 'Cliente cadastrado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }

    public function deletarCliente($id)
    {
        try {
            $cliente = $this->clienteService->obter($id)[0];

            return view('avoi.cliente.deletar', compact('cliente'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }

    public function deletarClienteDo(Request $request)
    {
        try {
            $data = $request->except(array('_method', '_token'));

            $this->clienteService->deletar($data['id_cliente']);

            return redirect()->route('cliente.listar')->with('messagemSucesso', 'Cliente excluído com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocorreu um erro, tente novamente e caso persista contacte nossa equipe!');
        }
    }
}
