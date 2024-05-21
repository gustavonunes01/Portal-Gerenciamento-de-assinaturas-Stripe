<?php

function parametro($nome, $default = null){
    return App\Models\Common\Parametro::parametro($nome, $default);
}

