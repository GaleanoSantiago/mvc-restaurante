<?php
require_once "./../../config/bd.php";

function indexPacientesModel() {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM medicos");
    $stament = $PDO->prepare("SELECT 
        pacientes.id_paciente, 
        personas.id_persona, 
        personas.nombre_persona, 
        obras_sociales.obra_social AS obra_social, 
        grupos_sanguineos.grupo_sanguineo, 
        pacientes.num_seguro_social, 
        personas.cuit_persona, 
        personas.dni_persona, 
        municipios.nombre_municipio, 
        personas.direccion_persona AS direccion, 
        personas.codigo_postal AS codigo_postal, 
        personas.contacto_persona AS contacto 
    FROM 
        pacientes 
    INNER JOIN 
        personas ON personas.id_persona = pacientes.id_persona 
    INNER JOIN 
        obras_sociales ON pacientes.id_obra_social = obras_sociales.id_obra_social 
    INNER JOIN 
        grupos_sanguineos ON pacientes.id_grupo_sanguineo = grupos_sanguineos.id_grupo_sanguineo 
    INNER JOIN 
        municipios ON personas.id_municipio = municipios.id_municipio;
");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}


// Insertar Pacientes
function insertarPacienteModel($id_persona, $id_obra_social, $id_grupo_sanguineo, $num_seguro_social) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO `pacientes` VALUES 
        (NULL, :id_persona, :id_obra_social, :id_grupo_sanguineo, :num_seguro_social)"
    );
    
    $stament->bindParam(":id_persona", $id_persona);
    $stament->bindParam(":id_obra_social", $id_obra_social);
    $stament->bindParam(":id_grupo_sanguineo", $id_grupo_sanguineo);
    $stament->bindParam(":num_seguro_social", $num_seguro_social);

    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Para ver un paciente

function showPacienteModel($id) {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM medicos");
    $stament = $PDO->prepare("SELECT 
            pacientes.id_paciente, 
            personas.id_persona, 
            personas.nombre_persona, 
            obras_sociales.obra_social AS obra_social, 
            obras_sociales.id_obra_social,
            grupos_sanguineos.grupo_sanguineo, 
            grupos_sanguineos.id_grupo_sanguineo, 
            pacientes.num_seguro_social, 
            personas.cuit_persona, 
            personas.dni_persona, 
            municipios.nombre_municipio, 
            municipios.id_municipio, 
            personas.direccion_persona AS direccion, 
            personas.codigo_postal AS codigo_postal, 
            personas.contacto_persona AS contacto,
            personas.id_rol_persona 
        FROM 
            pacientes 
        INNER JOIN 
            personas ON personas.id_persona = pacientes.id_persona 
        INNER JOIN 
            obras_sociales ON pacientes.id_obra_social = obras_sociales.id_obra_social 
        INNER JOIN 
            grupos_sanguineos ON pacientes.id_grupo_sanguineo = grupos_sanguineos.id_grupo_sanguineo 
        INNER JOIN 
            municipios ON personas.id_municipio = municipios.id_municipio
        WHERE pacientes.id_paciente = :id
    ");
    $stament->bindParam(":id", $id);

    return ($stament->execute()) ? $stament->fetchAll() : false;
}


// Actualizar pacientes
function updatePacientesModel($id, $id_obra_social, $id_grupo_sanguineo, $num_seguro_social) {
    $PDO = getConnection();
    $statement = $PDO->prepare(
        "UPDATE pacientes SET 
        id_obra_social = :id_obra_social, 
        id_grupo_sanguineo = :id_grupo_sanguineo, 
        num_seguro_social = :num_seguro_social 
        WHERE id_paciente = :id"
    );
    
    $statement->bindParam(":id", $id);
    $statement->bindParam(":id_obra_social", $id_obra_social);
    $statement->bindParam(":id_grupo_sanguineo", $id_grupo_sanguineo);
    $statement->bindParam(":num_seguro_social", $num_seguro_social);

    return ($statement->execute()) ? $id : false;
}
