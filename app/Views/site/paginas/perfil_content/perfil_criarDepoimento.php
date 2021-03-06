<?= $this->extend('site/paginas/perfil_content/perfil_template') ?>
<?= $this->section('content_perfil') ?>

    <div class="tab-pane active show" id="criarDepoimento"> 
        <form method="POST" enctype="multipart/form-data" action="/perfil/enviarDepoimento">
            <div class="form-group">
                <div class="row text-left">
                    <div class="col-12">
                        <select name="id_pet" id="id_pet" class="selectpicker" data-style="select-with-transition" title="Selecione um pet" data-size="7" required>
                            <option value="" selected>Escolha o pet</option>
                            <option value="2">Bruce</option>
                            <option value="3">Spike</option>
                        </select>
                    </div>
                </div>
                <div class="row text-left" style="margin-top: 15px;">
                    <div class="col-12">
                        <label for="depoimento"><i class="material-icons" style="font-size: 15px !important;">edit</i>Faça um depoimento sobre o seu pet adotado</label>
                        <textarea class="form-control" id="depoimento" rows="10"></textarea>
                    </div>
                </div>
                <div class="row text-center" style="margin-top: 15px;">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Enviar depoimento</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?= $this->endSection() ?>