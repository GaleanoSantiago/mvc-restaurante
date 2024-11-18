<?php
require_once "./../../config/bd.php";

function indexMedicosModel() {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM medicos");
    $stament = $PDO->prepare("SELECT 
        medicos.id_medico, 
        empleados.id_empleado, 
        personas.nombre_persona, 
        personas.id_persona, 
        especialidades.tipo_especialidad AS especialidad, 
        situaciones_revista.situacion_revista, 
        medicos.numero_colegiado, 
        personas.cuit_persona, 
        personas.dni_persona, 
        municipios.nombre_municipio, 
        personas.direccion_persona AS direccion, 
        personas.codigo_postal AS codigo_postal, 
        personas.contacto_persona AS contacto 
    FROM 
        medicos 
    INNER JOIN 
        empleados ON medicos.id_empleado = empleados.id_empleado 
    INNER JOIN 
        personas ON empleados.id_persona = personas.id_persona 
    INNER JOIN 
        especialidades ON medicos.id_especialidad = especialidades.id_especialidad 
    INNER JOIN 
        situaciones_revista ON medicos.id_situacion_revista = situaciones_revista.id_situacion_revista 
    INNER JOIN 
        municipios ON personas.id_municipio = municipios.id_municipio");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}
// Funcion para mostrar empleados por cargo 
function contMedicosPorEspecialidadModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT te.id_especialidad, te.tipo_especialidad, COUNT(e.id_medico) AS cantidad_registros FROM medicos e INNER JOIN especialidades te ON e.id_especialidad = te.id_especialidad GROUP BY te.id_especialidad, te.tipo_especialidad ORDER BY te.id_especialidad");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}
// Funcion para mostrar empleados por cargo 
function contMedicosPorEspecialidadModel2(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT te.id_especialidad, te.tipo_especialidad, COALESCE(COUNT(e.id_medico), 0) AS cantidad_registros FROM especialidades te LEFT JOIN medicos e ON e.id_especialidad = te.id_especialidad GROUP BY te.id_especialidad, te.tipo_especialidad ORDER BY te.id_especialidad");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}
// Funcion para la lista de empleados agrupados por cargo
function MedicosPorEspecialidadModel() {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM empleados");
    $stament = $PDO->prepare("SELECT medicos.id_medico, empleados.id_empleado, personas.nombre_persona, especialidades.tipo_especialidad AS especialidad, situaciones_revista.situacion_revista, medicos.numero_colegiado, personas.cuit_persona, personas.dni_persona, municipios.nombre_municipio, direcciones.direccion, direcciones.codigo_postal, contactos.contacto FROM medicos INNER JOIN empleados ON medicos.id_empleado = empleados.id_empleado INNER JOIN personas ON empleados.id_persona = personas.id_persona INNER JOIN especialidades ON medicos.id_especialidad = especialidades.id_especialidad INNER JOIN situaciones_revista ON medicos.id_situacion_revista = situaciones_revista.id_situacion_revista INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio INNER JOIN direcciones ON personas.id_direccion = direcciones.id_direccion INNER JOIN contactos ON personas.id_contacto = contactos.id_contacto ORDER BY especialidad, medicos.id_medico;");
    
    return ($stament->execute()) ? $stament->fetchAll() : false;
}


// Insertar Medico
function insertarMedico($id_empleado, $num_colegiado, $id_especialidad, $id_situacion_revista) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO medicos VALUES 
        (NULL, :id_empleado, :numero_colegiado, :id_especialidad, :id_situacion_revista)"
    );
    
    $stament->bindParam(":id_empleado", $id_empleado);
    $stament->bindParam(":numero_colegiado", $num_colegiado);
    $stament->bindParam(":id_especialidad", $id_especialidad);
    $stament->bindParam(":id_situacion_revista", $id_situacion_revista);
    
    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Para mostrar Medico

function showMedicoModel($id){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT 
            medicos.id_medico, 
            empleados.id_empleado, 
            personas.nombre_persona, 
            personas.id_persona, 
            especialidades.tipo_especialidad AS especialidad, 
            especialidades.id_especialidad, 
            situaciones_revista.situacion_revista,
            situaciones_revista.id_situacion_revista,
            medicos.numero_colegiado, 
            personas.cuit_persona, 
            personas.dni_persona, 
            municipios.nombre_municipio, 
            municipios.id_municipio, 
            personas.direccion_persona AS direccion, 
            personas.codigo_postal AS codigo_postal, 
            personas.contacto_persona AS contacto, 
            personas.id_rol_persona 
        FROM 
            medicos 
        INNER JOIN 
            empleados ON medicos.id_empleado = empleados.id_empleado 
        INNER JOIN 
            personas ON empleados.id_persona = personas.id_persona 
        INNER JOIN 
            especialidades ON medicos.id_especialidad = especialidades.id_especialidad 
        INNER JOIN 
            situaciones_revista ON medicos.id_situacion_revista = situaciones_revista.id_situacion_revista 
        INNER JOIN 
            municipios ON personas.id_municipio = municipios.id_municipio
        WHERE medicos.id_medico = :id
        ORDER BY empleados.id_empleado limit 1
    ");
    $stament->bindParam(":id", $id);
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Actualizar Medicos
function updateMedicosModel($id_medico, $id_empleado, $numero_colegiado, $id_especialidad, $id_situacion_revista) {
    $PDO = getConnection();
    $statement = $PDO->prepare(
        "UPDATE `medicos` SET 
        `id_empleado` = :id_empleado, 
        `numero_colegiado` = :numero_colegiado, 
        `id_especialidad` = :id_especialidad, 
        `id_situacion_revista` = :id_situacion_revista 
        WHERE `medicos`.`id_medico` = :id_medico"
    );
    
    $statement->bindParam(":id_medico", $id_medico);
    $statement->bindParam(":id_empleado", $id_empleado);
    $statement->bindParam(":numero_colegiado", $numero_colegiado);
    $statement->bindParam(":id_especialidad", $id_especialidad);
    $statement->bindParam(":id_situacion_revista", $id_situacion_revista);

    return ($statement->execute()) ? $id_medico : false;
}


?>