<?= $this->extend('site/paginas/perfil_content/perfil_template') ?>
<?php $this->section('content_perfil'); ?>
<div class="tab-pane active show" id="cadastrarPet">
    <form method="POST" enctype="multipart/form-data" action="/perfil/addPet">
        <div class="row">
            <div class="col">
                <h3 class="text-left font-weight-bold">Informações básicas</h3>
                <br>
                <div class="form-group">
                    <label for="nomePet">Nome do Pet</label>
                    <input type="text" class="form-control" name="nome" id="nomePet" placeholder="Informe o nome do Pet" required>
                </div>
                <table style="text-align: left;">
                    <tr>
                        <td style="width: 80px;"><label for="exampleFormControlInput1" style="margin-bottom: 0px !important;">Especie:</label></td>
                        <td>
                            <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="especie" id="gato" value="1" required> Gato
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline" style="margin-bottom: 15px;">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="especie" id="cachorro" value="2"> Cachorro
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="porte" style="margin-bottom: 0px !important;">Porte:</label></td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td><label for="sexo" style="margin-bottom: 0px !important;">Sexo:</label></td>
                        <td>
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
                        </td>
                    </tr>
                </table>
                <div class="form-group text-left" style="margin-top: 15px;">
            
                <select class="selectpicker" data-style="select-with-transition" name="estado" title="Selecione um pet" data-size="7">
                <option selected>Selecione o Estado</option>
                <option value="<?= $estados->id_estado?>"><?= $estados->nome?></option>
  
                </select>
                <select class="selectpicker" data-style="select-with-transition" name="cidade" title="Selecione um pet" data-size="7">
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
                    <textarea class="form-control" name="descricao" id="descricao" rows="3" required></textarea>
                </div>
            </div>
            <div class="col">
                <h3 class="text-left font-weight-bold">Personalidade</h3>
                <div class="form-group text-left">
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
                            Sociavel
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
                    <h3>Se adapta bem</h3>
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
                <div class="row">
                    <div class="col">
                        <h3 class="text-left">Saúde do Pet</h3>
                        <div class="form-group text-left">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Galeria Adicionar fotos -->
        <div class="row">
            <div class="col">
                <h3>Adicione fotos do Pet</h3>
                <hr>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="profile-tabs">
                    <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="#studio" role="tab" data-toggle="tab" aria-selected="false">
                                <i class="material-icons">photo</i>
                                Olha eu!
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#works" role="tab" data-toggle="tab" aria-selected="false">
                                <i class="material-icons">camera_alt</i>
                                Olá!
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#favorite" role="tab" data-toggle="tab" aria-selected="true">
                                <i class="material-icons">photo</i>
                                Amei essa!
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 ml-auto mr-auto">
                <div class="tab-content tab-space">
                    <!-- Array Images Gallery -->
                    <div class="tab-pane text-center gallery" id="studio">
                        <div class="row">
                            <div class="col-md-12">
                                <input type='file' name="imagem1" id="imagem1" required/>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="works">
                        <div class="row">
                            <div class="col-md-12">
                                <input type='file' name="imagem2" id="imagem2" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="favorite">
                        <div class="row">
                            <div class="col-md-12">
                            <input type='file' name="imagem3" id="imagem3" />
                                <img src="https://m.hindustantimes.com/rf/image_size_1200x900/HT/p2/2020/04/28/Pictures/_c238d9a8-8930-11ea-804e-137f71f5151d.jpg" class="rounded" style="width: 100%;">
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
        <button type="submit" class="btn btn-primary">Cadastrar Pet</button>
    </form>
</div>
<?php $this->endSection() ?>