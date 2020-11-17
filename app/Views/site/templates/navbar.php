  <!-- NAVEGAÇÃO -->
  <nav class="navbar <?php if ($menuTransparent == true) : echo 'navbar-transparent navbar-color-on-scroll';
                      endif; ?> fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?= base_url(); ?>">
          <b>Amigo não se abandona</b> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="" target="_blank">
              <i class="material-icons">text_snippet</i> Sobre o projeto
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pets">
              <i class="material-icons">pets</i> Quero adotar
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">account_circle</i> Minha conta
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <?php if (session()->has('logado')) : ?>
                <a href="/perfil" class="dropdown-item">
                  <i class="material-icons"></i> Perfil
                </a>
                <?php if (session()->get('id_nivel') == 3) : ?>
                <a href="/perfil/ong" class="dropdown-item">
                  <i class="material-icons">house</i> Minha ONG
                </a>
                <?php endif; ?>
                <a href="/perfil/cadastrarpet" class="dropdown-item">
                  <i class="material-icons">add</i> Cadastrar pet
                </a>
                <a href="/perfil/listarpets" class="dropdown-item">
                  <i class="material-icons">pets</i> Meus pets cadastrados
                </a>
                <a href="/perfil/criardepoimento" class="dropdown-item">
                  <i class="material-icons">comment</i> Criar depoimento
                </a>
                <a href="/auth/sair" class="dropdown-item">
                  <i class="material-icons">clear</i> Sair
                </a>
              <?php else : ?>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#loginModal">
                  <i class="material-icons">lock_open</i> Realizar Login
                </a>
                <a href="#" data-toggle="modal" data-target="#signupModal" class="dropdown-item">
                  <i class="material-icons">lock</i> Cadastrar - se
                </a>
              <?php endif; ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Siga-nos no Twitter" rel="nofollow">
              <i class="fab fa-facebook-square" style="font-size: 16px;"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Curta nossa página no Facebook" rel="nofollow">
              <i class="fab fa-instagram" style="font-size: 16px;"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Siga-nos no Instagram" rel="nofollow">
              <i class="fab fa-twitter-square" style="font-size: 16px;"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>