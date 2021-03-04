<?php

namespace Controllers;
use \Core\Controller;


/**
 * @author Douglas Carvalho Santos
 */
class DividasController extends Controller
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
    public function new($devedorID)
    {
        if($devedorID < 1) {
            redirect(baseURL() . 'devedor');
            return;
        }
        $this->loadModel('DevedorModel');

        $data['devedor'] = $this->DevedorModel->getByID($devedorID);

        if($data['devedor'] === false) {
            redirect(baseURL() . 'devedor');
            return;
        }

        $vencimento = $this->request->getPost('vencimento');
        $valor = $this->request->getPost('valor');
        $descricao = $this->request->getPost('descricao');

        if($valor) {
            $this->loadModel('DividaModel');

            $insertData = [
                'devedor_id' => $devedorID,
                'vencimento' => convertDate($vencimento),
                'updated' => date('Y-m-d H:i:s'),
                'valor' => $valor,
                'descricao' => $descricao
            ];

            $this->DividaModel->save($insertData);

            setMessage('dividaAdicionada');
        }

        $this->loadView('_includes/header');
        $this->loadView('dividas/new', $data);
        $this->loadView('_includes/footer');
    
    }

    /**
     * @param  $dividaID
     */
    public function update($dividaID)
    {
        
        if($dividaID < 1) {
            // redirect
            return;
        }
        $this->loadModel('DividaModel');

        $data['divida'] = $this->DividaModel->getByID($dividaID);

        if($data['divida'] === false) {
            // redirect
            return;
        }

        $vencimento = $this->request->getPost('vencimento');
        $valor = $this->request->getPost('valor');
        $descricao = $this->request->getPost('descricao');

        if($valor) {

            $updateData = [
                'id' => $dividaID,
                'vencimento' => convertDate($vencimento),
                'updated' => date('Y-m-d H:i:s'),
                'valor' => $valor,
                'descricao' => $descricao
            ];

            $this->DividaModel->save($updateData);

            setMessage('dividaAdicionada');
            $data['divida'] = $this->DividaModel->getByID($dividaID);
        }

        $this->loadView('_includes/header');
        $this->loadView('dividas/update', $data);
        $this->loadView('_includes/footer');
    
    }

    /**
     * @param  $dividaID
     */
    public function archive( $dividaID)
    {
        // TODO implement here
    }

    /**
     * @param  $page
     */
    public function listAll($page)
    {
        // TODO implement here
    }

    public function paid($dividaID) {
        if($dividaID < 1) {
            redirect(baseURL() . 'devedor');
            return;
        }
        
        $this->loadModel('DividaModel');

       $divida = $this->DividaModel->getByID($dividaID);
       $data['divida'] = $divida;

        if($data['divida'] === false) {
            redirect(baseURL() . 'devedor');
            return;
        }

        $this->DividaModel->save([
            'id' => $dividaID,
            'paga' =>  true
        ]);

        setMessage('marcadaComoPaga');


        redirect(baseURL() . 'dividas/view/' . $data['divida']['devedor_id']);
    }

    /**
     * @param  $devedorID
     */
    public function devedor($devedorID)
    {
        if($devedorID < 1) {
            redirect(baseURL() . 'devedor');
            return;
        }
        $this->loadModel('DevedorModel');

        $data['devedor'] = $this->DevedorModel->getByID($devedorID);

        if($data['devedor'] === false) {
            redirect(baseURL() . 'devedor');
            return;
        }
        
        $this->loadModel('DividaModel');
        $data['devedor'] = $this->DevedorModel->getByID($devedorID);

        $dividas = $this->DividaModel->selectJoined('*, dividas.id as divida_id', [
            'devedor.id' => $devedorID
        ],[
            'devedor' => 'dividas.devedor_id = devedor.id'
        ]);
        
        $valorTotal = 0;
        
        for($i = 0; $i < count($dividas); $i++) {
            $valorTotal += $dividas[$i]['valor'];
        }

        $this->loadModel('EnderecoModel');

        $endereco = $this->EnderecoModel->select('*',[
            'devedor_id' => $devedorID
        ]);
        
        if($endereco === false) {
            redirect(baseURL() . 'devedor');
            return;
        }

        $data['endereco'] = $endereco[0];
        $data['dividas'] = $dividas;
        $data['total'] = count($dividas);
        $data['valorTotal'] = $valorTotal;

        $this->loadView('_includes/header');
        $this->loadView('dividas/devedor', $data);
        $this->loadView('_includes/footer');
    }

}
