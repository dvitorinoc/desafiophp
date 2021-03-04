<?php

namespace Controllers;
use \Core\Controller;


/**
 * @author Douglas Carvalho Santos
 */
class DevedoresController extends Controller
{

    /**
     * Default constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     */
    public function new()
    {
        
        $nome = $this->request->getPost('nome');
        $cpf_cnpj = $this->request->getPost('cpf_cnpj');
        $nascimento = $this->request->getPost('nascimento');
        $pj = $this->request->getPost('pj');
        $rua = $this->request->getPost('rua');
        $numero = $this->request->getPost('numero');
        $bairro = $this->request->getPost('bairro');
        $cidade = $this->request->getPost('cidade');
        $uf = $this->request->getPost('uf');
        $complemento = $this->request->getPost('complemento');
        $cep = $this->request->getPost('cep');

        if($nome) {
            $this->loadModel('DevedorModel');
            $this->loadModel('EnderecoModel');

            $insertData = [
                'nome' => $nome,
                'data_nascimento' => convertDate($nascimento),
                'cpf_cnpj' => $cpf_cnpj,
                'tipo_juridico' => $pj
            ];

            $this->DevedorModel->save($insertData);

            $devedor = $this->DevedorModel->select('*',[
                'cpf_cnpj' => $cpf_cnpj
            ]);

            $this->EnderecoModel->insert([
                'devedor_id' => $devedor[0]['id'],
                'rua' => $rua,
                'numero' => $numero,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'complemento' => $complemento,
                'cep' => $cep,
                'uf' => $uf
            ]);
            
            setMessage('cadastroCriado');
        }

        
        $this->loadView('_includes/header');
        $this->loadView('devedor/new');
        $this->loadView('_includes/footer');
    }

    /**
     * 
     */
    public function update()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function listAll($id)
    {
        $this->loadModel('DevedorModel');
        $this->DevedorModel->save([
            'id' => 1,
            'cpf_cnpj' => '029.194.331-48',
            'data_nascimento' => '1991-06-07'
        ]);
        //print_r($this->DevedorModel->getByID(1));
        $data['devedores'] = $this->DevedorModel->select('*', [
            'tipo_juridico' => 'pf'
        ]);


        $this->loadView('_includes/header');
        $this->loadView('devedor/index', $data);
        $this->loadView('_includes/footer');
    }

    /**
     * 
     */
    public function delete()
    {
        // TODO implement here
    }

}
