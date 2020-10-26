                        <div class="tab-pane active show" id="profile">
                          <form method="POST" action="pets/cadastrar">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputEmail4">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" value="">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" id="senha" placeholder="Senha">
                              </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-2 ml-auto">
                                <label for="inputZip">CEP</label>
                                <input type="text" class="form-control" id="inputZip">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputCity">Cidade</label>
                                <input type="text" class="form-control" id="inputCity">
                              </div>
                              <div class="form-group col-md-3">
                                <label for="inputState">Estado</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Selecione..</option>
                                  <option>...</option>
                                </select>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </form>
                          </div>