<?php

namespace App\Services;

use App\Repository\ClienteRepository;

class ClienteService implements DefaultService
{

    protected $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function inserir(array $data)
    {
        return $this->clienteRepository->inserir($data);
    }

    public function atualizar(array $data, $id)
    {
        return $this->clienteRepository->atualizar($data, $id);
    }

    public function obterTodosAtivos()
    {
        return $this->clienteRepository->obterTodosAtivos();
    }

    public function obterTodos()
    {
        return $this->clienteRepository->obterTodos();
    }

    public function obter($id)
    {
        return $this->clienteRepository->obter($id);
    }

    public function deletar($id)
    {
        return $this->clienteRepository->deletar($id);
    }
}
