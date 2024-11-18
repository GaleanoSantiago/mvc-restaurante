<?php
require_once "./../../config/bd.php";

function indexConsultasModel() {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM medicos");
    $stament = $PDO->prepare("SELECT 
        consultas.id_consulta,
        consultas.fecha_hora,
        consultas.id_medico,
        consultas.id_paciente,
        consultas.id_estado_consulta,
        pacientes.id_persona, 
        personas_paciente.nombre_persona AS nombre_paciente, 
        personas_paciente.dni_persona AS dni_paciente,
        empleados.id_empleado, 
        personas_medico.nombre_persona AS nombre_medico,
        personas_medico.dni_persona AS dni_medico,
        obras_sociales.obra_social AS obra_social, 
        grupos_sanguineos.grupo_sanguineo, 
        pacientes.num_seguro_social, 
        personas_paciente.cuit_persona, 
        personas_paciente.contacto_persona AS contacto,
        estado_consulta.estado_consulta
    FROM 
        consultas 
    INNER JOIN 
        pacientes ON consultas.id_paciente = pacientes.id_paciente
    INNER JOIN 
        medicos ON consultas.id_medico = medicos.id_medico
    INNER JOIN 
        empleados ON medicos.id_empleado = empleados.id_empleado 
    INNER JOIN 
        personas personas_medico ON empleados.id_persona = personas_medico.id_persona 
    INNER JOIN 
        personas personas_paciente ON pacientes.id_persona = personas_paciente.id_persona 
    INNER JOIN 
        obras_sociales ON pacientes.id_obra_social = obras_sociales.id_obra_social 
    INNER JOIN 
        grupos_sanguineos ON pacientes.id_grupo_sanguineo = grupos_sanguineos.id_grupo_sanguineo 
    INNER JOIN 
        municipios ON personas_paciente.id_municipio = municipios.id_municipio
    INNER JOIN 
        estado_consulta ON consultas.id_estado_consulta = estado_consulta.id_estado_consulta
    ORDER BY 
        consultas.id_consulta ASC;
        ");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}


function guardarConsultaModel($fecha_hora, $id_medico, $id_paciente){
    
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO `consultas`(`fecha_hora`, `id_medico`, `id_paciente`, `id_estado_consulta`) 
        VALUES (:fecha_hora, :id_medico, :id_paciente, '1')"
    );
    
    $stament->bindParam(":fecha_hora", $fecha_hora);
    $stament->bindParam(":id_medico", $id_medico);
    $stament->bindParam(":id_paciente", $id_paciente);

    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

function consultasPorMedicoModel($id){
    $PDO = getConnection();
    $stament = $PDO->prepare(
            "SELECT 
            consultas.id_consulta,
            consultas.fecha_hora,
            consultas.id_medico,
            consultas.id_paciente,
            consultas.id_estado_consulta,
            pacientes.id_persona, 
            personas_paciente.nombre_persona AS nombre_paciente, 
            personas_paciente.dni_persona AS dni_paciente,
            empleados.id_empleado, 
            personas_medico.nombre_persona AS nombre_medico,
            personas_medico.dni_persona AS dni_medico,
            obras_sociales.obra_social AS obra_social, 
            grupos_sanguineos.grupo_sanguineo, 
            pacientes.num_seguro_social, 
            personas_paciente.cuit_persona, 
            personas_paciente.contacto_persona AS contacto,
            estado_consulta.estado_consulta
        FROM 
            consultas 
        INNER JOIN 
            pacientes ON consultas.id_paciente = pacientes.id_paciente
        INNER JOIN 
            medicos ON consultas.id_medico = medicos.id_medico
        INNER JOIN 
            empleados ON medicos.id_empleado = empleados.id_empleado 
        INNER JOIN 
            personas personas_medico ON empleados.id_persona = personas_medico.id_persona 
        INNER JOIN 
            personas personas_paciente ON pacientes.id_persona = personas_paciente.id_persona 
        INNER JOIN 
            obras_sociales ON pacientes.id_obra_social = obras_sociales.id_obra_social 
        INNER JOIN 
            grupos_sanguineos ON pacientes.id_grupo_sanguineo = grupos_sanguineos.id_grupo_sanguineo 
        INNER JOIN 
            municipios ON personas_paciente.id_municipio = municipios.id_municipio
        INNER JOIN 
            estado_consulta ON consultas.id_estado_consulta = estado_consulta.id_estado_consulta
        WHERE personas_medico.dni_persona = :id
        ORDER BY 
        consultas.id_consulta ASC;
        ;");
        
    $stament->bindParam(":id", $id);
    return ($stament->execute()) ? $stament->fetchAll() : false;
    
}

function consultasPorMedicoFechaModel($dni_medico, $fecha){
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "SELECT 
            consultas.id_consulta,
            consultas.fecha_hora,
            consultas.id_medico,
            consultas.id_paciente,
            consultas.id_estado_consulta,
            pacientes.id_persona, 
            personas_paciente.nombre_persona AS nombre_paciente, 
            personas_paciente.dni_persona AS dni_paciente,
            empleados.id_empleado, 
            personas_medico.nombre_persona AS nombre_medico,
            personas_medico.dni_persona AS dni_medico,
            obras_sociales.obra_social AS obra_social, 
            grupos_sanguineos.grupo_sanguineo, 
            pacientes.num_seguro_social, 
            personas_paciente.cuit_persona, 
            personas_paciente.contacto_persona AS contacto,
            estado_consulta.estado_consulta
        FROM 
            consultas 
        INNER JOIN 
            pacientes ON consultas.id_paciente = pacientes.id_paciente
        INNER JOIN 
            medicos ON consultas.id_medico = medicos.id_medico
        INNER JOIN 
            empleados ON medicos.id_empleado = empleados.id_empleado 
        INNER JOIN 
            personas personas_medico ON empleados.id_persona = personas_medico.id_persona 
        INNER JOIN 
            personas personas_paciente ON pacientes.id_persona = personas_paciente.id_persona 
        INNER JOIN 
            obras_sociales ON pacientes.id_obra_social = obras_sociales.id_obra_social 
        INNER JOIN 
            grupos_sanguineos ON pacientes.id_grupo_sanguineo = grupos_sanguineos.id_grupo_sanguineo 
        INNER JOIN 
            municipios ON personas_paciente.id_municipio = municipios.id_municipio
        INNER JOIN 
            estado_consulta ON consultas.id_estado_consulta = estado_consulta.id_estado_consulta
        WHERE 
            personas_medico.dni_persona = :dni_medico AND 
            DATE(consultas.fecha_hora) = :fecha
        ORDER BY 
            consultas.id_consulta ASC;"
    );
    
    $stament->bindParam(":dni_medico", $dni_medico);
    $stament->bindParam(":fecha", $fecha);
    return ($stament->execute()) ? $stament->fetchAll() : false;
}


// Para eliminar Consulta
function deleteConsultaModel($id) {
    $PDO = getConnection();
    $stament = $PDO->prepare("DELETE FROM `consultas` WHERE `consultas`.`id_consulta` = :id");
    $stament->bindParam(":id", $id);
    return ($stament->execute()) ? true : false;
}

// Actualizar estado de consulta
function updateEstadoConsultaModel($id_estado_consulta, $id_consulta) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "UPDATE consultas SET 
        id_estado_consulta = :id_estado_consulta 
        WHERE id_consulta = :id_consulta"
    );

    // Vincular parámetros
    $stament->bindParam(":id_estado_consulta", $id_estado_consulta, PDO::PARAM_INT);
    $stament->bindParam(":id_consulta", $id_consulta, PDO::PARAM_INT);

    // Ejecutar la sentencia
    return $stament->execute();
}
