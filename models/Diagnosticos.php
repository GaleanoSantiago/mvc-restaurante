<?php
require_once "./../../config/bd.php";

function indexDiagnosticoModel() {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM medicos");
    $stament = $PDO->prepare("SELECT 
        d.id_diagnostico,
        d.descripcion_diagnostico,
        d.notas_adicionales,
        c.id_consulta,
        c.fecha_hora AS fecha_consulta,
        personas_paciente.nombre_persona AS nombre_paciente,
        personas_medico.nombre_persona AS nombre_medico
    FROM 
        diagnostico_consulta d
    INNER JOIN 
        consultas c ON d.id_consulta = c.id_consulta
    INNER JOIN 
        pacientes ON c.id_paciente = pacientes.id_paciente
    INNER JOIN 
        medicos ON c.id_medico = medicos.id_medico
    INNER JOIN 
        empleados ON medicos.id_empleado = empleados.id_empleado
    INNER JOIN 
        personas personas_medico ON empleados.id_persona = personas_medico.id_persona
    INNER JOIN 
        personas personas_paciente ON pacientes.id_persona = personas_paciente.id_persona
    ORDER BY 
        c.id_consulta ASC;");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}


function showDiagnosticoModel($id) {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM medicos");
    $stament = $PDO->prepare("SELECT 
        d.id_diagnostico,
        d.descripcion_diagnostico,
        d.notas_adicionales,
        c.id_consulta,
        c.fecha_hora AS fecha_consulta,
        personas_paciente.nombre_persona AS nombre_paciente,
        personas_medico.nombre_persona AS nombre_medico
    FROM 
        diagnostico_consulta d
    INNER JOIN 
        consultas c ON d.id_consulta = c.id_consulta
    INNER JOIN 
        pacientes ON c.id_paciente = pacientes.id_paciente
    INNER JOIN 
        medicos ON c.id_medico = medicos.id_medico
    INNER JOIN 
        empleados ON medicos.id_empleado = empleados.id_empleado
    INNER JOIN 
        personas personas_medico ON empleados.id_persona = personas_medico.id_persona
    INNER JOIN 
        personas personas_paciente ON pacientes.id_persona = personas_paciente.id_persona
    WHERE c.id_consulta = :id");
    $stament->bindParam(":id", $id);

    // return ($stament->execute()) ? $stament->fetchAll() : false;
    return ($stament->execute()) ? $stament->fetchAll(PDO::FETCH_ASSOC) : false;
}

function guardarDiagnosticoModel($id_consulta, $descripcion, $notas_adicionales){
    
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO `diagnostico_consulta` (`id_consulta`, `descripcion_diagnostico`, `notas_adicionales`) 
        VALUES (:id_consulta, :descripcion, :notas_adicionales)"
    );
    
    $stament->bindParam(":id_consulta", $id_consulta);
    $stament->bindParam(":descripcion", $descripcion);
    $stament->bindParam(":notas_adicionales", $notas_adicionales);

    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Actualizar diagnostico
function updateDiagnosticoModel($id, $descripcion, $notas) {

    $PDO = getConnection();
    $stament = $PDO->prepare(
        "UPDATE `diagnostico_consulta` 
        SET `descripcion_diagnostico` = :descripcion, `notas_adicionales` = :notas 
        WHERE `diagnostico_consulta`.`id_consulta` = :id"
    );

    // Vincular parámetros
    $stament->bindParam(":id", $id);
    $stament->bindParam(":descripcion", $descripcion);
    $stament->bindParam(":notas", $notas);

    // Ejecutar la sentencia
    // return ($stament->execute()) ? $stament->fetchAll() : false;
    return $stament->execute();
}

// Para eliminar Consulta
function deleteDiagnosticoModel($id) {
    $PDO = getConnection();
    $stament = $PDO->prepare("DELETE FROM `diagnostico_consulta` 
    WHERE `diagnostico_consulta`.`id_consulta` = :id");

    $stament->bindParam(":id", $id);
    
    return ($stament->execute()) ? true : false;
}
