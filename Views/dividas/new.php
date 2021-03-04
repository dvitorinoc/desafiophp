<?php if(useMessage('dividaAdicionada')) { ?>
<div class="alert alert-success">Dívida adicionada com sucesso</div>
<?php } ?>

<div class="row">
    <div class="col-12">
        <a href="<?php echo baseUrl() ?>dividas/view/<?php echo $devedor['id'] ?>" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Voltar para Devedor </a>
    </div>
</div> <br>
<div class="card">
    <div class="card-header"> <h6>Cadastrar Nova Dívida</h6> </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                
                <form action="<?php echo baseUrl() ?>dividas/new/<?php echo $devedor['id'] ?>" method="post">

                    <div class="row">
                        <div class="col-4">
                            <label for="vencimento">Vencimento</label>
                            <input class="form-control" name="vencimento" type="text" autocomplete="off" id="vencimento">
                        </div>
                        <div class="col-4">
                            <label for="valor">Valor</label>
                            <input class="form-control text-right" name="valor" autocomplete="off" type="text" id="valor">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10" require></textarea>
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

        $('#vencimento').datepicker({ dateFormat: 'dd/mm/yy' });
        $("#valor").mask('#.##0,00', {reverse: true});


    })

</script>