<?php
require_once "./../../models/Auxiliares.php";

function lastId() {
    return lastIdModel();
}

function indexMunicipios() {
    $result = indexMunicipiosModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexTipoEmpleados() {
    $result = indexTipoEmpleadosModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexDepartamentos(){
    $result = indexDepartamentosModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexPaises(){
    $result = indexPaisesModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexProvincias(){
    $result = indexProvinciasModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function limpiarcadena($campo) {
    $campo = strip_tags($campo);
    $campo = filter_var($campo, FILTER_UNSAFE_RAW);
    $campo = htmlspecialchars($campo);
    return $campo;
}
// ======================== Medicos ==========================

// index de Especialidad
function indexEspecialidad() {
    $result = indexEspecialidadModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

// index de Situacion Revista
function indexSituacionRevista() {
    $result = indexSituacionRevistaModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

// ======================== Pacientes ==========================


function indexObraSocial() {
    $result = indexObraSocialModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function indexGrupoSanguineo() {
    $result = indexGrupoSanguineoModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

// ======================== Usuarios ==========================


function indexRolesUsuario(){
    $result = indexRolesUsuarioModel();
    return $result;
}

// ======================== Consultas ==========================

function indexEstadoConsultas(){
    $result = indexEstadoConsultasModel();
    return $result;
}