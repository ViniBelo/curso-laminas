<?php

namespace Pessoa\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Pessoa\Model\PessoaTable;

class PessoaController extends AbstractActionController 
{

    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel(['pessoas' => $this->table->getAll()]);
    }

    public function adicionarAction()
    {
        return new ViewModel();
    }

    public function salvarAction()
    {
        return new ViewModel();
    }

    public function editarAction()
    {
        return new ViewModel();
    }

    public function removerAction()
    {
        return new ViewModel();
    }

    public function confirmacaoAction()
    {

    }
}