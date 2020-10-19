  <!-- NAVEGAÇÃO -->
  <nav class="navbar <?php if($menuTransparent == true) : echo 'navbar-transparent navbar-color-on-scroll'; endif; ?> fixed-top navbar-expand-lg" color-on-scroll="100"
    id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
          <b>Amigo não se abandona</b> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="https://www.creative-tim.com/product/material-kit-pro" target="_blank">
              <i class="material-icons">text_snippet</i> Sobre o projeto
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.creative-tim.com/product/material-kit-pro" target="_blank">
              <i class="material-icons">pets</i> Quero adotar
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">account_circle</i> Minha conta
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="#" class="dropdown-item" data-toggle="modal" data-target="#loginModal">
                <i class="material-icons">lock_open</i> Realizar Login
              </a>
              <a href="#" data-toggle="modal" data-target="#signupModal"
                class="dropdown-item">
                <i class="material-icons">lock</i> Registrar - se
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim"
              target="_blank" data-original-title="Follow us on Twitter" rel="nofollow">
              <i class="fa fa-twitter"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom"
              href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook"
              rel="nofollow">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom"
              href="https://www.instagram.com/CreativeTimOfficial" target="_blank"
              data-original-title="Follow us on Instagram" rel="nofollow">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>