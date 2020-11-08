<div class="row">
    <div class="col">
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php if (isset($all)) : echo 'active';
                                    endif; ?>" href="/pets/todos" data-toggle="tooltip" data-placement="top" title="Listar Todos">
                    <i class="fas fa-paw"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($dogs)) : echo 'active';
                                    endif; ?>" href="/pets/caes" data-toggle="tooltip" data-placement="top" title="Listar cães">
                    <i class="fas fa-dog"></i>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($cats)) : echo 'active';
                                    endif; ?>" href="/pets/gatos" data-toggle="tooltip" data-placement="top" title="Listar Gatos">
                    <i class="fas fa-cat"></i>

                </a>
            </li>

        </ul>
        <hr>
        <?php

        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/187.113.226.25/json"));
        echo $details->region . ' | ' . $details->city;

        ?>
        <a data-toggle="collapse" href="#buscaavancada" aria-expanded="false" aria-controls="buscaavancada">
            <i class="far fa-search"></i> Busca Avançada
        </a>

         <form method="POST" action="<?= base_url('/pets/buscar') ?>">                               
            <div class="collapse" id="buscaavancada">

                <select class="selectpicker " data-style="select-with-transition" name="estado_pet" title="Estado" data-size="7" required>
              
                    <option value="21">Rio Grande do Sul</option>
                </select>
                <select class="selectpicker " data-style="select-with-transition" name="cidade_pet" title="Single Select" data-size="7">
                    <option value="0"selected>Cidade</option>
                    <option value="4932">Porto alegre</option>
                    <option value="5091">Viamão</option>
                </select>
                <select class="selectpicker " data-style="select-with-transition" name="porte" title="Single Select" data-size="7">
                    <option value="0" selected>Tamanho</option>
                    <option value="1">Pequeno</option>
                    <option value="2">Medio</option>
                    <option value="3">Grande</option>
                </select>
                <select class="selectpicker " data-style="select-with-transition" name="sexo" title="Single Select" data-size="7">
                    <option value="0" selected>Sexo</option>
                    <option value="1">Macho</option>
                    <option value="2">Fêmea</option>
                </select>
                <button class="btn btn-primary" href="<?= base_url('buscar/filtrar')?>" aria-expanded="false">
                    <i class="far fa-search"></i> Filtrar
                </button>
            </div>
        </form>
    </div>
</div>