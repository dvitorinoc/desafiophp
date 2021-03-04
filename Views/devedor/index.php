<div class="card">
    <div class="card-header"> <h6>Devedores</h6> </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo baseUrl() ?>devedor/new" class="btn btn-info"> <i class="fa fa-plus"></i> Cadastrar Novo </a>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF/CNPJ</th>
                                <th>Data de Nascimento</th>
                                <th>Personalidade Jurídica</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($devedores as $devedor) {
                        ?>
                            <tr>
                                <td><?php echo $devedor['id'] ?></td>
                                <td><?php echo $devedor['nome'] ?></td>
                                <td><?php echo $devedor['cpf_cnpj'] ?></td>
                                <td><?php echo date('d/m/Y',strtotime($devedor['data_nascimento'])) ?></td>
                                <td><?php echo $devedor['tipo_juridico'] == 'pf' ? 'Pessoa Física' : 'Pessoa Jurídica'  ?></td>
                                <td>
                                    <a href="<?php echo baseUrl() ?>dividas/view/<?php echo $devedor['id'] ?>" class="btn btn-info">Ver Cadastro e Dívidas</a>
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