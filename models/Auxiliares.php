<?php
require_once "./../../config/bd.php";

// Index de Municipios
function indexMunicipiosModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM municipios");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Index de Tipo Empleados
function indexTipoEmpleadosModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM tipos_empleado");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Index de Departamentos
function indexDepartamentosModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM departamentos");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Index de Paises
function indexPaisesModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM paises");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Index de Provincias
function indexProvinciasModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM provincias");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}


// ======================== Medicos ==========================

// Index de Especialidad
function indexEspecialidadModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM especialidades");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Index de Situacion Revista
function indexSituacionRevistaModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT sr.id_situacion_revista, sr.situacion_revista, COALESCE(COUNT(m.id_medico), 0) AS cantidad_registros FROM situaciones_revista sr LEFT JOIN medicos m ON m.id_situacion_revista = sr.id_situacion_revista GROUP BY sr.id_situacion_revista, sr.situacion_revista ORDER BY sr.id_situacion_revista");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// ======================== Pacientes ==========================


function indexObraSocialModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM `obras_sociales`");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

function indexGrupoSanguineoModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM `grupos_sanguineos`");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// ======================== Usuarios ==========================


function indexRolesUsuarioModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM `roles_usuarios`");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// ======================== Consultas ==========================

function indexEstadoConsultasModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM `estado_consulta`");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}