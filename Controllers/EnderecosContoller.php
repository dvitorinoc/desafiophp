<?php

namespace Controllers;
use \Core\Controller;


/**
 * @author Douglas Carvalho Santos
 */
class EnderecosContoller extends Controller
{

    /**
     * Default constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param null $devedorID
     */
    public function new($devedorID)
    {
        // TODO implement here
    }

    /**
     * @param  $enderecoID
     */
    public function update($enderecoID)
    {
        // TODO implement here
    }

    /**
     * @param  $enderecoID
     */
    public function delete( $enderecoID)
    {
        // TODO implement here
    }
    /**
     * @param  $enderecoID
     */
    public function view($enderecoID)
    {
        $data = [];
        $this->loadView('_includes/header');
        $this->loadView('devedor/view', $data);
        $this->loadView('_includes/footer');
    }

}
