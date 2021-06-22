<?php

//Caminho para inclusão do arquivo com o namespace

namespace App\Models\Entidades;

//Classe
class Noticias {

    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'noticias', 'descricao' => 'Noticias'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'imagem', 'titulo', 'texto', 'data_publicacao', 'administrador_id'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'id'],
        'imagem' => ['tamanho' => 30, 'obrigatorio' => false, 'descricao' => 'imagem'],
        'titulo' => ['tamanho' => 100, 'obrigatorio' => true, 'descricao' => 'Titulo'],
        'texto' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'Descricao'],
        'data_publicacao' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'data de Cadastro'],
        'administrador_id' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'administrador'],
    ];

    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $imagem;
    private $titulo;
    private $texto;
    private $data_publicacao;
    private $administrador_id;

    //Construtor da classe, onde os arrays de informações são montados
    public function __construct($dados = null) {
        if ($dados != null) {
            foreach ($this as $indice => $valor) {
                $this->$indice = isset($dados[$indice]) ? $dados[$indice] : null;
            }
        }
    }

    //Funções de set e get
    function getId() {
        return $this->id;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTexto() {
        return $this->texto;
    }

    function getData_publicacao() {
        return $this->data_publicacao;
    }

    function getAdministrador_id() {
        return $this->administrador_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setData_publicacao($data_publicacao) {
        $this->data_publicacao = $data_publicacao;
    }

    function setAdministrador_id($administrador_id) {
        $this->administrador_id = $administrador_id;
    }

}
