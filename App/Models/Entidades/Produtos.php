<?php
//Caminho para inclusão do arquivo com o namespace
namespace App\Models\Entidades;

//Classe
class Produtos{
    //Constante com informações de nome e descrição da tabela referente a está classe
    const TABELA = ['nome' => 'produtos', 'descricao' => 'Produtos'];
    //Campos existentes na tambela desta classe
    const CAMPOS = ['id', 'imagem', 'titulo', 'descricao', 'data_cadastro', 'administrador_id'];
    //Informaçõs sobre os campos da tabela
    const CAMPOSINFO = [   
        'id' => ['tamanho' => null, 'obrigatorio' => false, 'descricao' => 'id'],
        'imagem' => ['tamanho' => 30, 'obrigatorio' => false, 'descricao' => 'imagem'],
        'titulo' => ['tamanho' => 100, 'obrigatorio' => true, 'descricao' => 'Titulo'],
        'descricao' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'Descricao'],
        'data_cadastro' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'data de Cadastro'],
        'administrador_id' => ['tamanho' => null, 'obrigatorio' => true, 'descricao' => 'administrador'],
        
    ];
    
    //Variáveis privadas referentes aos campos da tabela
    private $id;
    private $imagem;
    private $titulo;
    private $descricao;
    private $data_cadastro;
    private $administrador_id;
    
    //Construtor da classe, onde os arrays de informações são montados
    public function __construct($dados = null) {
        if ($dados != null) {
            foreach( $this as $indice => $valor ) {
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

    function getDescricao() {
        return $this->descricao;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getAdministrador_id() {
        return $this->administrador_id;
    }

    function setId($id){
        $this->id = $id;
    }

    function setImagem($imagem){
        $this->imagem = $imagem;
    }

    function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    function setData_cadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;
    }

    function setAdministrador_id($administrador_id){
        $this->administrador_id = $administrador_id;
    }
}