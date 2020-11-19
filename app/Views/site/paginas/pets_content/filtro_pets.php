<div class="row">
    <div class="col">
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php if (isset($todos)) : echo 'active';
                                    endif; ?>" href="/pets/todos" data-toggle="tooltip" data-placement="top" title="Listar Todos">
                    <i class="fas fa-paw"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($caes)) : echo 'active';
                                    endif; ?>" href="/pets/caes" data-toggle="tooltip" data-placement="top" title="Listar Cães">
                    <i class="fas fa-dog"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($gatos)) : echo 'active';
                                    endif; ?>" href="/pets/gatos" data-toggle="tooltip" data-placement="top" title="Listar Gatos">
                    <i class="fas fa-cat"></i>
                </a>
            </li>
        </ul>
        <hr>
        <a data-toggle="collapse" href="#buscaavancada" aria-expanded="false" aria-controls="buscaavancada">
            <i class="far fa-search"></i> Busca Avançada  <?php if(session()->has('filtrar')): echo ' | <a href ="'.base_url('redefinir').'">Redefinir Filtros</a>'; endif; ?>
        </a>
        <?=$mensagem_filtro?>
         <form method="POST" action="<?= base_url('/pets') ?>">                               
            <div class="collapse" id="buscaavancada">

                <select id="filtro_estado" class="selectpicker " data-style="select-with-transition" name="estado_pet" title="Estado" data-size="7" required>
                <option>Selecione o Estado</option>
                <?php foreach($estados as $row=>$value){
                    $selected = '';
                   if(session()->has('filtrar')){
                        if(session()->get('filtrar_id_estado') == $value->id_estado){
                            $selected = 'selected';
                        }
                        echo " <option value=".$value->id_estado." ".$selected.">" .$value->nome. "</option>";
                    }else{
                        if(session()->get('id_estado') == $value->id_estado){
                            $selected = 'selected';
                        }
                        echo " <option value=".$value->id_estado." ".$selected.">" .$value->nome. "</option>";
                    }?>
             <?php }?>
                </select>
                <select id="filtro_cidade" class="selectpicker " data-style="select-with-transition" name="cidade_pet" title="Selecione Cidade" data-size="7">
                <option value="0">Todos</option>
                <?php foreach($cidades as $row=>$value){
                    $selected = '';
                        if(session()->has('filtrar')){
                            if(session()->get('filtrar_id_cidade') == $value->id_municipio){
                                $selected = 'selected';
                             }
                        echo " <option value=".$value->id_municipio." ".$selected.">" .$value->nome. "</option>";
                      }else{
                        if(session()->get('id_cidade') == $value->id_municipio){
                            $selected = 'selected';
                        }
                        echo " <option value=".$value->id_municipio." ".$selected.">" .$value->nome. "</option>";
                      }?>
               <?php }?>
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