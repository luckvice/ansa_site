<?= $this->extend('site/templates/base_template') ?>
<?= $this->section('content') ?>

<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../assets/img/fale-conosco.jpg'); transform: translate3d(0px, 66.6667px, 0px);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="title font-weight-bold" style="color: #db7fdb;">Fale Conosco</h1>
                    <h4 class="font-weight-bold">Envie sua mensagem e tire suas dúvidas!</h4>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="contact-content">
        <div class="container">
            <h2 class="title" style="padding-top: 50px;">Envie sua mensagem</h2>
            <div class="row">
                <div class="col-md-6">
                    <p class="description">Informe seus dados e envie sua sugestão, dúvida ou qualquer outra necessidade. Responderemos o mais breve possível.<br><br></p>
                    
                    <form role="form" id="contact-form" method="post">
                        <div class="form-group bmd-form-group">
                            <label for="name" class="bmd-label-floating">Seu Nome</label>
                            <input type="text" class="form-control" id="name" name="nome">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="exampleInputEmails" class="bmd-label-floating">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmails" name="email">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label for="phone" class="bmd-label-floating">Telefone</label>
                            <input type="text" class="form-control" id="phone" name="telefone">
                        </div>
                        <div class="form-group label-floating bmd-form-group">
                            <label class="form-control-label bmd-label-floating" for="message"> Sua Mensagem</label>
                            <textarea class="form-control" rows="6" id="message" name="mensagem"></textarea>
                        </div>
                        <div class="submit text-center">
                            <input type="submit" class="btn btn-primary btn-raised btn-round" value="Enviar">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 ml-auto">
                    <div class="info info-horizontal" style="padding: 0px;">
                        <div class="icon icon-primary">
                            <i class="material-icons">pin_drop</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Porto Alegre, RS</h4>
                            <p> Não temos endereço físico<br>
                            Porto Alegre, RS<br>
                            Brasil
                            </p>
                        </div>
                    </div>
                    <div class="info info-horizontal" style="padding: 0px;">
                        <div class="icon icon-primary">
                            <i class="material-icons">phone</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">Telefone/WhatsApp</h4>
                            <p> Amigo Não se Abandona<br>
                            +55 (51) 99999-8888<br>
                            Seg - Dom, 9h - 22h
                            </p>
                        </div>
                    </div>
                    <div class="info info-horizontal" style="padding: 0px;">
                        <div class="icon icon-primary">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">E-mail</h4>
                            <p>Gmail<br>
                            amigonaoseabandona@gmail.com<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>