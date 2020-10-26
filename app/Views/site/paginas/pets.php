<?= $this->extend('site/templates/base_template') ?>
<?= $this->section('content') ?>
<div class="main">
    <section>
    <?= $this->include('site/paginas/Pets_content/filtro_sidebar') ?>
    </section>
</div>
<?= $this->endSection() ?>
