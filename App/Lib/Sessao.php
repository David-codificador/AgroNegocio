<?php

namespace App\Lib;

class Sessao {

    public static function setAdministrador($administrador) {
        $_SESSION['administrador'] = $administrador;
    }

    public static function getAdministrador($indice) {
        return  ($_SESSION['administrador'][$indice]) ? $_SESSION['administrador'][$indice] : null;
    }

    public static function setLogadoAdministrador($status) {
        $_SESSION['logadoAdministrador'] = $status;
    }

    public static function logadoAdministrador() {
        return ($_SESSION['logadoAdministrador']) ? $_SESSION['logadoAdministrador'] : false;
    }

    public static function gravaMensagem($mensagem, $titulo = '', $tipo = 1) {
        switch ($tipo) {
            case 1:
                $tipo = "success";
                break;
            case 2:
                $tipo = "warning";
                break;
            case 3:
                $tipo = "error";
                break;
            default :
                $tipo = "success";
                break;
        }
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['titulo'] = $titulo;
        $_SESSION['tipo'] = $tipo;
    }

    public static function retornaMensagem() {
        return ($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
    }
    
      public static function retornaTitulo() {
        return ($_SESSION['titulo']) ? $_SESSION['titulo'] : '';
    }

    public static function retornaTipo() {
        return ($_SESSION['tipo']) ? $_SESSION['tipo'] : '';
    }

    public static function limpaMensagem() {
        unset($_SESSION['mensagem']);
        unset($_SESSION['titulo']);
        unset($_SESSION['tipo']);
    }
    
      public static function existeMensagem() {
         return isset($_SESSION['mensagem']) and $_SESSION['mensagem']  ? false : true;
    }
    
    
    public static function gravaFormulario($form) {
        $_SESSION['form'] = $form;
    }

    public static function retornaFormulario($key) {
        return (isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";
    }

    public static function limpaFormulario() {
        unset($_SESSION['form']);
    }
}