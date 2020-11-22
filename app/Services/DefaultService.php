<?php

namespace App\Services;


interface DefaultService
{
    public function inserir(array $data);
    public function atualizar(array $data, $id);
    public function obterTodos();
    public function obter($id);
    public function deletar($id);
}
