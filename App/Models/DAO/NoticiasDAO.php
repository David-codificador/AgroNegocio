<?php

namespace App\Models\DAO;

use App\Models\Entidades\Noticias;

class NoticiasDAO extends BaseDAO {

    function selecionar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {

        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

           $noticias_obj = null;

                foreach ($resultado as $v) {
                    $noticias_obj = new Noticias($v);
                }
            
                return $noticias_obj;
            } else {
                return FALSE;
            }
    }

    public function listar($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug = null) {
        $resultado = $this->select($tabela, $campos, $quantidade, $pagina, $condicao, $valorCondicao, $orderBy, $debug);

        if ($resultado) {

            $noticias_obj = [];

            foreach ($resultado as $v) {
                $noticias_obj[] = new Noticias($v);
            }

            return $noticias_obj;
        } else {
            return FALSE;
        }
    }

    public function alterar($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug = null) {

        $noticias = $this->selecionarVetor($tabela, ["*"], $quantidade, null, $condicao, $valorCondicao, null, $debug);
        if ($noticias) {

            $dados_alterar = array();
            foreach ($noticias as $indice => $valor) {
                $dados_alterar[$indice] = !isset($dados[$indice]) ? $valor : $dados[$indice];
            }

            $resultado = $this->update($tabela, $dados, $condicao, $valorCondicao, $quantidade, $debug);

            if ($resultado) {
                return $noticias;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
