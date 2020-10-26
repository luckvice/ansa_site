                        <div class="tab-pane" id="cadastrarPet">
                          <form method="POST" action="pets/cadastrar">
                            <div class="row">
                              <div class="col">
                              <h3>Informações básicas</h3>
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="bmd-form-group" for="exampleFormControlInput1">Especie*</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                      <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="especie" id="inlineRadio1" value="option1"> Gato
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="especie" id="inlineRadio2" value="option2"> Cachorro
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="bmd-form-group" for="exampleFormControlInput1">Tamanho*</label>
                                    </div>
                                    <div class="col-md-7 text-left">
                                      <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tamanho" id="inlineRadio1" value="option1"> Pequeno
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tamanho" id="inlineRadio2" value="option2"> Médio
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="tamanho" id="inlineRadio2" value="option2"> Grande
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <label class="bmd-form-group" for="exampleFormControlInput1">Sexo*</label>
                                    </div>
                                    <div class="col-md-5 text-left">
                                      <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="option1"> Macho
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                        <div class="form-check form-check-radio form-check-inline">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="option2"> Fêmea
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
                                <select class="selectpicker text-left" data-style="select-with-transition" title="Idade" data-size="7">
                                    <option Select>Idade</option>
                                    <option value="2">Filhote</option>
                                    <option value="3">Jovem</option>
                                    <option value="3">Adulto</option>
                                    <option value="3">Idoso</option>
                                </select>
                                  
                                </div>
                                <div class="form-group">
                                  <label for="descricao">Uma breve descrição do pet</label>
                                  <textarea class="form-control" id="descricao" rows="3"></textarea>
                                </div>
                              </div>
                              <div class="col">
                              <h3>Personalidade</h3>
                                <div class="form-group">
                                 
                                  <div class="form-check">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" name="personalidade[]" value="">
                                            Dócil
                                          <span class="form-check-sign">
                                              <span class="check"></span>
                                          </span>
                                      </label>
                                  </div>
                                  <div class="form-check">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" name="personalidade[]" value="">
                                            Dócil
                                          <span class="form-check-sign">
                                              <span class="check"></span>
                                          </span>
                                      </label>
                                  </div>
                                  <div class="form-check">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" name="personalidade[]" value="">
                                            Dócil
                                          <span class="form-check-sign">
                                              <span class="check"></span>
                                          </span>
                                      </label>
                                  </div>
                                  <div class="form-check">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" name="personalidade[]" value="">
                                            Dócil
                                          <span class="form-check-sign">
                                              <span class="check"></span>
                                          </span>
                                      </label>
                                  </div>
                                </div>
                              <h3>Cuidados veterinários</h3>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar Pet</button>
                          </form>
                          </div>