<?= $this->extend('site/paginas/perfil_content/perfil_template') ?>
<?php $this->section('content_perfil'); ?>
<div class="tab-pane active show" id="cadastrarPet">
                          <form method="POST" action="/pets/cadastrarPet">
                            <div class="row">
                              <div class="col">
                              <h3 class="text-left">Informações básicas</h3>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="bmd-form-group" for="exampleFormControlInput1">Especie*</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                      <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="especie" id="gato" value="1"> Gato
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="especie" id="cachorro" value="2"> Cachorro
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="bmd-form-group" for="exampleFormControlInput1">Porte*</label>
                                    </div>
                                    <div class="col-md-7 text-left">
                                      <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tamanho" id="pequeno" value="1"> Pequeno
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tamanho" id="medio" value="2"> Médio
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tamanho" id="grande" value="3"> Grande
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="bmd-form-group" for="sexo">Sexo*</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                      <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="sexo" id="macho" value="1"> Macho
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="sexo" id="femea" value="2"> Fêmea
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="nomePet">Nome do Pet</label>
                                  <input type="text" class="form-control" id="nomePet" placeholder="Informe o nome do Pet">
                                </div>
                                <div class="form-group bmd-form-group">
                                <label for="nomePet">Qual a idade do pet:</label>
                                <select class="selectpicker text-left" data-style="select-with-transition" name="idade" title="Idade" data-size="7">
                                    <option Select>Idade</option>
                                    <option value="2">Filhote</option>
                                    <option value="3">Jovem</option>
                                    <option value="3">Adulto</option>
                                    <option value="3">Idoso</option>
                                </select>
                                  
                                </div>
                                <div class="form-group">
                                  <label for="descricao">Uma breve descrição do pet</label>
                                  <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
                                </div>
                              </div>
                              <div class="col">
                                <h3 class="text-left">Personalidade</h3>
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
                                    <h3>Vive Bem</h3>
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
                                    <h3 class="text-left">Cuidados veterinários</h3>
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
                            <?php if(isset($erro_perfilCadPet)): ?>

                            <div class="alert alert-danger" role="alert">
                              <?= $erro_perfilCadPet->listErrors()?>
                              <?php echo 'DEBUG:'; var_dump($erro_perfilCadPet->listErrors())?>
                            </div>
                            <?php endif;?>
                            <button type="submit" class="btn btn-primary">Cadastrar Pet</button>
                          </form>
                          </div>
<?php $this->endSection() ?>
