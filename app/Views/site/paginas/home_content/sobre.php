<?= $this->extend('site/templates/base_template') ?>
<?= $this->section('content') ?>

<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../assets/img/sobre-cover.jpg'); transform: translate3d(0px, 66.6667px, 0px);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="title font-weight-bold" style="color: #db7fdb;">Sobre Nós</h1>
                    <h4 class="font-weight-bold">Conheça um pouco mais sobre o projeto Amigo Não se Abandona.</h4>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="about-team team-1" style="padding-bottom: 0px !important;">
            <div class="row flex-justify-center">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="title">Uma ponte para um novo lar</h2>
                    <h5 class="description" style="margin-bottom: 30px !important;">O projeto Amigo Não se Abandona tem uma estrutura Tecno-Social, baseada em proporcionar auxílio tecnológico para solucionar/amenizar um problema da sociedade.</h5>
                    <h5 class="description" style="margin-bottom: 30px !important;">Nosso objetivo é aproximar animais abandonados de possíveis lares, através das nossas ferramentas e técnicas de comunicação entre os protetores dos animais e os possíveis tutores.</h5>
                </div>
            </div>

            <div class="row flex-justify-center">
                <div class="col-md-2">
                </div>

                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="../assets/img/sobre-ong.jpg">
                            </a>
                        </div>

                        <div class="card-content">
                            <h4 class="card-title">Ongs</h4>
                            <h6 class="category text-muted">Exponha seus animais!</h6>

                            <p class="card-description">
                                Com página dedicada para cada ONG, o Amigo Não se Abandona permite maior visibilidade para os animais que estão sob os cuidados das organizações protetoras dos animais. 
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-profile card-plain">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="../assets/img/sobre-protetor.jpg">
                            </a>
                        </div>

                        <div class="card-content">
                            <h4 class="card-title">Protetores</h4>
                            <h6 class="category text-muted">Animais abandonados? Anuncie!</h6>

                            <p class="card-description">
                                Através da nossa plataforma, protetores independentes podem anunciar animais encontrados nas ruas ou resgatados por qualquer motivo. Nossas ferramentas exponenciarão a chance de adoção do animal.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                </div>
            </div>

        </div>
        <div class="about-services features-2">
            <div class="row flex-justify-center">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="title">Prezamos a facilidade</h2>
                    <h5 class="description">Para uma maior agilidade dentro da nossa plataforma, disponibilizamos para os usuários diversas ferramentas que agilizam o processo de adoção e anúncio de animais.</h5>
                </div>
            </div>

            <div class="row flex-justify-center">
                <div class="col-md-4">
                    <div class="info info-horizontal">
                        <div class="icon icon-rose">
                            <i class="material-icons">gesture</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">1. Site Amigável</h4>
                            <p>Nossa plataforma é desenvolvida para que qualquer usuário seja capaz de anunciar ou adoção um animal. Além disso, o Amigo Não se Abandona se adapta a qualquer tipo de dispotivo, elevando o alcance dos nossos animais.</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="info info-horizontal">
                        <div class="icon icon-rose">
                            <i class="material-icons">chat</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">2. Mensagens</h4>
                            <p>O ANSA conta com ferramentas que agilizam o contato entre os protetores e os possíveis tutores. Enviamos mensagens de adoção e sugestões diretamente para o WhatsApp e e-mail do interessado, buscando agilizar o processo.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info info-horizontal">
                        <div class="icon icon-rose">
                            <i class="material-icons">build</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">3. Disponibilidade</h4>
                            <p>Estamos 24 horas por dia e 7 dias por semana disponíveis para interações em nosso site. Todos os usuários podem utilizar nossa ferramenta a qualquer momento que acharem necessário e de forma completamente gratuita.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-office">
            <div class="row text-center flex-justify-center" >
                <div class="col-md-8 col-md-offset-2" style="margin-bottom: 40px;">
                    <h2 class="title">Se possível, adote! =)</h2>
                    <h4 class="description">A adoção representa um benefício para a sociedade e para os animais. Mas lembre-se: a adoção deve ser feita de forma consciente e responsável, pois o animal se tornará um membro da família.</h4>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>