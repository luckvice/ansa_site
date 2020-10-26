                        <div class="tab-pane active show" id="profile">
                        <h3 class="text-left">Suas informações</h3>
                        <div class="row">
                          <div class="col md-6">
                            <div class="card" style="width: 20rem;">
                              <div class="card-body">
                                <h4 class="card-title">Pets Divulgados</h4>
                                <p class="card-text"><h3>0</h3></p>
                              </div>
                            </div>
                          </div>
                          <div class="col md-6">
                            <div class="card" style="width: 20rem;">
                              <div class="card-body">
                                <h4 class="card-title">Pets Adotados</h4>
                                <p class="card-text"><h3>0</h3></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                          <form method="POST" action="pets/cadastrar">
                          
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="email">E-mail</label>
                                <input type="email" readonly class="form-control" name="email" id="email" placeholder="E-mail" value="">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                              </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control" name="cep" id="cep">
                              </div>
                              <div class="form-group col-md-2">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" name="estado" id="estado">
                              </div>
                              <div class="form-group col-md-4">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" name="cidade" id="cidade">
                              </div>
                              <div class="form-group col-md-4">
                                <label for="telefone">Telefone/whats</label>
                                <input type="tel" class="form-control" name="telefone" id="telefone">
                              </div>
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="dadosPrivados" value="">
                                      Deixar visível meus dados <br> (Maiores chances de adoção)
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </form>
                          </div>