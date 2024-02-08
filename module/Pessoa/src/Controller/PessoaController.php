<?php

namespace Pessoa\Controller;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class PessoaController extends AbstractActionController 
{
    public function indexAction()
    {
        return new ViewModel();
    }
}