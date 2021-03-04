<div class="card">
    <div class="card-header"> <h6>Endereços</h6> </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Rua</th>
                                <th>Número</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Complemento</th>
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
                                    <a href="<?php echo baseUrl() ?>enderecos/view/<?php echo $devedor['id'] ?>" class="btn btn-info">Endereços</a>
                                    <a href="<?php echo baseUrl() ?>dividas/view/<?php echo $devedor['id'] ?>" class="btn btn-info">Dívidas</a>
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