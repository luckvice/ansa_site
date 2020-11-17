
    <!-- ONGS -->
    <div class="section">
    <div class="team-3">
        <div class="container">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
              <h2 class="title">Ongs que ja fazem parte do nosso projeto</h2>
              <h5 class="description">Venha fazer parte, cadastre sua ONG <a href="#" data-toggle="modal" data-target="#signupModal"> aqui.</a></h5>
            </div>
          </div>
          <div class="row">
          <?php foreach($ongs as $key=>$value){?>
            <div class="col-md-6">
              <div class="card card-profile card-plain">
                <div class="row">
                  <div class="col-md-5">
                  <a href="<?=base_url()?>">
                  <div class="content">
                    <div class="content-overlay"></div>
                    <div class="pet-full-pic">
                    <img src="data:image/jpeg;base64,<?=$value->avatar?>">
                    </div>
                    <div class="content-details fadeIn-bottom">
                      <h3 class="content-title"><?=$value->nome?></h3>
                      <p class="content-text">Conhecer</p>
                    </div>
                  </div>
                </a>
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h4 class="card-title"><?=$value->nome?></h4>
                      <h6 class="card-category text-muted"><?=$value->nome_cidade?> / <?=$value->uf?></h6>
                      <p class="card-description">
                      <b><a href="<?=base_url('ong/'.$value->id_ong)?>">Veja mais sobre a ong</a></b> 
                      </p>
                    </div>
                    <div class="card-footer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
