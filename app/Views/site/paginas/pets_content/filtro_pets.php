<div class="row">
    <div class="col">
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php if (isset($all)) : echo 'active';
                                    endif; ?>" href="/pets/estados/cidades/todos" data-toggle="tooltip" data-placement="top" title="Listar Todos">
                    <i class="fas fa-paw"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($dogs)) : echo 'active';
                                    endif; ?>" href="/pets/estados/cidades/caes" data-toggle="tooltip" data-placement="top" title="Listar cães">
                    <i class="fas fa-dog"></i>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($cats)) : echo 'active';
                                    endif; ?>" href="/pets/estados/cidades/gatos" data-toggle="tooltip" data-placement="top" title="Listar Gatos">
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


        <div class="collapse" id="buscaavancada">

            <select class="selectpicker " data-style="select-with-transition" title="Single Select" data-size="7">
                <option selected>Estado</option>
                <option value="2">Rio Grande do Sul</option>
            </select>
            <select class="selectpicker " data-style="select-with-transition" title="Single Select" data-size="7">
                <option selected>Cidade</option>
                <option value="2">Porto alegre</option>
                <option value="3">Viamão</option>
            </select>
            <select class="selectpicker " data-style="select-with-transition" title="Single Select" data-size="7">
                <option selected>Tamanho</option>
                <option value="2">Pequeno</option>
                <option value="3">Medio</option>
                <option value="3">Grande</option>
            </select>
            <select class="selectpicker " data-style="select-with-transition" title="Single Select" data-size="7">
                <option selected>Sexo</option>
                <option value="2">Macho</option>
                <option value="3">Fêmea</option>
            </select>
            <a href="/pets/buscar" aria-expanded="false">
                <i class="far fa-search"></i> Filtrar
            </a>
        </div>
    </div>
</div>