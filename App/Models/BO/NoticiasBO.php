<?php

//Caminho de inclusão do arquivo com o namespace

namespace App\Models\BO;

//Caminho para Inclusão de arquivos usados
use App\Models\DAO\NoticiasDAO;

//Classe: mesmo nome do arquivo criado.
class NoticiasBO extends BaseBO {

    public function instanciaDAO() {
        return new NoticiasDAO();
    }

}

?>