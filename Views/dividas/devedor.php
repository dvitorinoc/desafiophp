<h1 class="h3">Dívidas do cliente <?php echo $devedor['nome'] ?></h1>
<?php if(useMessage('marcadaComoPaga')) { ?>
<div class="alert alert-success">Dívida marcada como paga.</div>
<?php } ?>

<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total de Dívidas em Aberto</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Valor total devido</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo toBRLFormat($valorTotal) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h6>Informações</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-4"> <b> Nome </b> </div>
                    <div class="col-8"><?php echo $devedor['nome'] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4"> <b> <?php  echo ($devedor['tipo_juridico'] == 'pf' ? 'CPF' : 'CNPJ') ?></b> </div>
                    <div class="col-8"><?php echo $devedor['cpf_cnpj'] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-6"> <b> <?php  echo ($devedor['tipo_juridico'] == 'pf' ? 'Data de Nascimento' : 'Data de Abertura') ?></b> </div>
                    <div class="col-6"><?php echo date('d/m/Y', strtotime($devedor['data_nascimento'])) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <h6>Endereço</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-4"> <b> Rua </b> </div>
                    <div class="col-8"><?php echo $endereco['rua'] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4"> <b> Número </b> </div>
                    <div class="col-8"><?php echo $endereco['numero'] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4"> <b> Bairro </b> </div>
                    <div class="col-8"><?php echo $endereco['bairro'] ?></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-4"> <b> Cidade </b> </div>
                    <div class="col-8"><?php echo $endereco['cidade'] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4"> <b> Estado </b> </div>
                    <div class="col-8"><?php echo $endereco['uf'] ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4"> <b> CEP </b> </div>
                    <div class="col-8"><?php echo $endereco['cep'] ?></div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-4"> <b> Complemento </b> </div>
                    <div class="col-8"><?php echo $endereco['complemento'] ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header"> <h6>Dívidas</h6> </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo baseUrl() ?>dividas/new/<?php echo $devedor['id'] ?>" class="btn btn-info"> <i class="fa fa-plus"></i> Adicionar Nova </a>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Vencimento</th>
                                <th>Última Atualização</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(count($dividas) == 0) {
                        ?>
                            <td colspan="6" class="text-center">Nenhuma dívida cadastrada</td>
                        <?php
                            }
                        ?>
                        <?php
                            foreach($dividas as $divida) {
                        ?>
                            <tr>
                                <td><?php echo $divida['divida_id'] ?></td>
                                <td><?php echo $divida['descricao'] ?></td>
                                <td class="text-right"><?php echo toBRLFormat($divida['valor']) ?></td>
                                <td><?php echo date('d/m/Y', strtotime($divida['vencimento'])) ?></td>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($divida['updated'])) ?></td>
                                <td>
                                    <a href="<?php echo baseUrl() ?>dividas/update/<?php echo $divida['divida_id'] ?>" class="btn btn-info">Atualizar</a>
                                    <?php if(!$divida['paga']) { ?><a href="<?php echo baseUrl() ?>dividas/paid/<?php echo $divida['divida_id'] ?>" class="btn btn-info">Marcar como Paga</a><?php } ?>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>