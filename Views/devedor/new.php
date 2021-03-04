<?php if(useMessage('cadastroCriado')) { ?>
<div class="alert alert-success">Novo cadastro de devedor criado com sucesso</div>
<?php } ?>

<div class="row">
    <div class="col-12">
        <a href="<?php echo baseUrl() ?>devedor" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Voltar para lista de devedores </a>
    </div>
</div> <br>
<div class="card">
    <div class="card-header"> <h6>Cadastrar Novo Devedor</h6> </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                
                <form action="<?php echo baseUrl() ?>devedor/new" method="post">

                    <div class="row">
                        <div class="col-5">
                            <label for="nome">Nome Completo</label>
                            <input class="form-control" name="nome" type="text" autocomplete="off" id="nome">
                        </div>
                        
                        <div class="col-2">
                            <label for="pj">Tipo</label>
                            <select name="pj" id="pj" class="form-control">
                                <option value="pf">Pessoa Física</option>
                                <option value="pj">Pessoa Jurídica</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label id="cpf_cnpj_label" for="cpf_cnpj">CPF</label>
                            <input class="form-control" name="cpf_cnpj" autocomplete="off" type="text" id="cpf_cnpj">
                        </div>
                        <div class="col-2">
                            <label id="nascimento_label" for="nascimento">Data de Nascimento</label>
                            <input class="form-control text-right" name="nascimento" autocomplete="off" type="text" id="nascimento">
                        </div>
                    </div>

                    <div class="row">
                    </div>
                    <hr>
                    <h5>Endereço</h5>
                    <div class="row">
                        <div class="col-3">
                            <label for="cep">CEP</label>
                            <input class="form-control" name="cep" autocomplete="off" type="text" id="cep">
                        </div>
                        <div class="col-7">
                            <label for="rua">Rua</label>
                            <input class="form-control" name="rua" autocomplete="off" type="text" id="rua">
                        </div>
                        <div class="col-2">
                            <label for="numero">Número</label>
                            <input class="form-control text-right" name="numero" autocomplete="off" type="text" id="numero">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="bairro">Bairro</label>
                            <input class="form-control" name="bairro" autocomplete="off" type="text" id="bairro">
                        </div>
                        <div class="col-4">
                            <label for="cidade">Cidade</label>
                            <input class="form-control" name="cidade" autocomplete="off" type="text" id="cidade">
                        </div>
                        <div class="col-4">
                            <label for="uf">Estado</label>
                            <select name="uf" id="uf" class="form-control">
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Mina Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantis</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="complemento">Complemento</label>
                            <input class="form-control" name="complemento" autocomplete="off" type="text" id="complemento">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info">Salvar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#nascimento').datepicker({ dateFormat: 'dd/mm/yy' });
        $("#nascimento").mask('##/##/####');
        $("#cpf_cnpj").mask('###.###.###-##');
        $("#cep").mask('##.###-###');
        $("#pj").change(function() {
            if($(this).val() == 'pf') {
                $("#cpf_cnpj_label").text('CPF')
                $("#nascimento_label").text('Data de Nascimento')
                $("#cpf_cnpj").mask('###.###.###-##');
            } else
            if($(this).val() == 'pj') {
                $("#cpf_cnpj_label").text('CNPJ')
                $("#nascimento_label").text('Data de Abertura')
                $("#cpf_cnpj").mask('##.###.###/####-##');
            }
        })

    })

</script>