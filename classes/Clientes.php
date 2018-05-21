<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clientes
 *
 * @author alumno
 */
class Clientes {
    private $idCliente, $nombreCompany, $nombreContacto, $pais, $telefono, $saldo;
    
    function __construct($arrayCliente) {
        foreach ($arrayCliente as $key => $value) {
            $this->$key = $value;
        }
    }

    
    function getIdCliente() {
        return $this->idCliente;
    }

    function getNombreCompany() {
        return $this->nombreCompany;
    }

    function getNombreContacto() {
        return $this->nombreContacto;
    }

    function getPais() {
        return $this->pais;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setNombreCompany($nombreCompany) {
        $this->nombreCompany = $nombreCompany;
    }

    function setNombreContacto($nombreContacto) {
        $this->nombreContacto = $nombreContacto;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function toArray() {
        return get_object_vars($this);
    }
}
