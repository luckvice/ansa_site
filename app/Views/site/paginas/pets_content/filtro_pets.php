<div class="row">
    <div class="col">
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="/pets#todos" role="tab" data-toggle="tab">
                    <i class="fas fa-paw"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pets/teste#caes" role="tab" data-toggle="tab">
                    <i class="fas fa-dog"></i>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pets#gatos" role="tab" data-toggle="tab">
                    <i class="fas fa-cat"></i>

                </a>
            </li>

        </ul>
        <hr>
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