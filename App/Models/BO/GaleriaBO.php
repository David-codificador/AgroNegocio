<?php
    //Caminho de inclusão do arquivo com o namespace
    namespace App\Models\BO;
    
    //Caminho para Inclusão de arquivos usados
    use App\Models\DAO\GaleriaDAO;
    
    //Classe: mesmo nome do arquivo criado.
    class GaleriaBO extends BaseBO{
        public function instanciaDAO(){
            return new GaleriaDAO();
        }
        
    }
?>