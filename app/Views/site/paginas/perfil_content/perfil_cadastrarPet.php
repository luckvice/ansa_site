<?= $this->extend('site/paginas/perfil_content/perfil_template') ?>
<?php $this->section('content_perfil'); ?>
<div class="tab-pane active show" id="cadastrarPet">
    <form method="POST" enctype="multipart/form-data" action="/perfil/addPet">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class="text-left font-weight-bold">Informações Básicas</h3>
                <br>
                <div class="form-group">
                    <label for="nomePet">Nome do Pet</label>
                    <input type="text" class="form-control" name="nome" id="nomePet" placeholder="Informe o nome do Pet" value="<?= old('nome'); ?>"  required>
                </div>
                <div class="form-check text-left">
                    <label style="margin-bottom: 0px !important; width: 70px;">Especie:</label>
                    <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="especie" id="gato" value="2" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?" aria-required="true" required="true"/> Gato
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="especie" id="cachorro" value="1"> Cachorro
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>

                </div>

                <div class="form-check text-left">
                    <label style="margin-bottom: 0px !important; width: 70px;">Porte:</label>
                    <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="porte" id="pequeno" value="1" required> Pequeno
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="porte" id="medio" value="2"> Médio
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="porte" id="grande" value="3"> Grande
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>

                </div>

                <div class="form-check text-left">
                    <label style="margin-bottom: 0px !important; width: 70px;">Sexo:</label>
                    <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="sexo" id="macho" value="1" required> Macho
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="sexo" id="femea" value="2"> Fêmea
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </div>
                
                <div class="form-group text-left" style="margin-top: 15px;">
                    <select class="selectpicker text-left" data-style="select-with-transition" title="Selecione um pet" data-size="7" name="estado">
                        <option selected>Selecione o Estado</option>
                        <option value="<?= $estados->id_estado?>"><?= $estados->nome?></option>
                    </select>

                    <select class="selectpicker text-left" data-style="select-with-transition" title="Selecione um pet" data-size="7" name="cidade">
                        <option selected>Selecione a cidade</option>
                       <?php
                        foreach($cidades as $row){
                       ?>
                         <option value="<?= $row->id_municipio?>"><?=$row->nome?></option>
                       <?php }?>
                    </select> 
                </div>

                <div class="form-group text-left" style="margin-top: 15px;">
                    <label for="idade">Qual a idade do pet:</label>
                    <select class="selectpicker text-left" data-style="select-with-transition" name="idade" title="Idade" data-size="7" required>
                        <option Select>Idade</option>
                        <option value="2">Filhote</option>
                        <option value="3">Jovem</option>
                        <option value="3">Adulto</option>
                        <option value="3">Idoso</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="descricao">Uma breve descrição do pet</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3" required><?= old('descricao'); ?></textarea>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3 class="text-left font-weight-bold">Personalidade</h3>
                <div class="form-group text-left">
                    <div class="row" style="margin-bottom: 35px;">
                        <div class="col-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="docil" value="1">
                                    Dócil
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="agressivo" value="1">
                                    Agressivo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="calmo" value="1">
                                    Calmo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="sociavel" value="1">
                                    Sociável
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="arisco" value="1">
                                    Arisco
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="bricalhao" value="1">
                                    Brincalhão
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="independente" value="1">
                                    Independente
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="carente" value="1">
                                    Carente
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="tenso" value="1">
                                    Tenso
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="assustado" value="1">
                                    Assustado
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h3 class="text-left font-weight-bold">Saúde do Pet</h3>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="vacinado" value="1">
                                    Vacinado
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="vermifugado" value="1">
                                    Vermifugado
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="castrado" value="1">
                                    Castrado
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="precisacuidados" value="1">
                                    Precisa de cuidados especiais
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <h3 class="text-left font-weight-bold">Habitat Adequado</h3>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="casa" value="1">
                                    Casa
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="apartamento" value="1">
                                    Apartamento
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- Galeria Adicionar fotos -->
        <div class="row">
            <div class="col">
                <h3 class="font-weight-bold">Adicione fotos do Pet</h3>
                <hr>

            </div>
        </div>
        <div class="row" style="margin: 20px;">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="profile-tabs" style="margin-top: 0px;">
                    <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="#pic1" role="tab" data-toggle="tab" aria-selected="false">
                                <i class="material-icons">camera_alt</i>
                                Perfil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pic2" role="tab" data-toggle="tab" aria-selected="false">
                                <i class="material-icons">camera_alt</i>
                                Opcional I
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pic3" role="tab" data-toggle="tab" aria-selected="true">
                                <i class="material-icons">camera_alt</i>
                                Opcional II
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pic4" role="tab" data-toggle="tab" aria-selected="true">
                                <i class="material-icons">camera_alt</i>
                                Opcional III
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 ml-auto mr-auto">
                <div class="tab-content">
                    <!-- Array Images Gallery -->
                    <div class="tab-pane text-center" id="pic1">
                        <div class="row">
                            <div class="col-md-12">
                                <input type='file' name="imagem1" id="imagem1" required/>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center" id="pic2">
                        <div class="row">
                            <div class="col-md-12">
                                <input type='file' name="imagem2" id="imagem2" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center" id="pic3">
                        <div class="row">
                            <div class="col-md-12">
                                <input type='file' name="imagem3" id="imagem3" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center" id="pic4">
                        <div class="row">
                            <div class="col-md-12">
                                <input type='file' name="imagem4" id="imagem3" />
                            </div>
                        </div>
                    </div>
                    <!-- END array -->
                </div>
            </div>
        </div>
        <?php if (isset($erro)) : ?>

            <div class="alert alert-danger" role="alert">
                <?= $erro ?>
            </div>
        <?php endif; ?>
        <button type="submit" id="cadastrar_pet" class="btn btn-primary" style="margin: 20px;">Cadastrar Pet</button>
    </form>
</div>
<?php $this->endSection() ?>