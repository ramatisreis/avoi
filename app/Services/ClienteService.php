<?php

namespace App\Services;

use App\Repository\ClienteRepository;

class ClienteService implements DefaultService
{

    protected $ClienteRepository;

    public function __construct(ClienteRepository $ClienteRepository)
    {
        $this->ClienteRepository = $ClienteRepository;
    }

    public function inserir(array $data)
    {
        return $this->ClienteRepository->inserir($data);
    }

    public function atualizar(array $data, $id)
    {
        return $this->ClienteRepository->atualizar($data, $id);
    }

    public function obterTodos()
    {
        return $this->ClienteRepository->obterTodos();
    }

    public function obter($id)
    {
        return $this->ClienteRepository->obter($id);
    }

    public function deletar($id)
    {
        return $this->ClienteRepository->deletar($id);
    }
}
