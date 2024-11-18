<?php
require_once "./../../models/Consultas.php";

function indexConsultas() {
    $rows = indexConsultasModel();

    return $rows;
}

function consultasPorMedico($id){
    $rows = consultasPorMedicoModel($id);
    return $rows;
}

function consultasPorMedicoFecha($dni, $fecha){
    $rows = consultasPorMedicoFechaModel($dni, $fecha);
    return $rows;
}

function guardarConsulta($fecha_hora, $id_medico, $id_paciente){
    $id = guardarConsultaModel($fecha_hora, $id_medico, $id_paciente);
    return $id;
}

function deleteConsulta($id){
    $response = deleteConsultaModel($id);
    return $response;
}

function updateEstadoConsulta($id_estado_consulta, $id_consulta){
    $response = updateEstadoConsultaModel($id_estado_consulta, $id_consulta);
    return $response;
}