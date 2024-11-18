<?php

require_once "./../../models/Empleados.php";

function index() {
    $result = indexModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function EmpleadosPorCargo($date=false) {
    $result = EmpleadosPorCargoModel($date);
    if ($result) {
        return $result;
    } else {
        return false;
    }
}
function contEmpleadosPorCargo() {
    $result = contEmpleadosPorCargoModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

// insertar direccion
function guardarDireccion($direccion, $cod_postal) {
    $id = insertarDireccion($direccion, $cod_postal);
    if ($id != false) {
        return $id;
    } else {
        return "no se guardo la direccion";
    }
}

// insertar contactos
function guardarContacto($email) {
    $id = insertarContacto($email);
    if ($id != false) {
        return $id;
    } else {
        return "no se guardo el contacto";
    }
}

// insertar persona
function guardarPersona($nombre, $cuit, $dni, $municipio, $direccion, $contacto, $codigo_postal, $id_rol_persona) {
    $id = insertarPersona($nombre, $cuit, $dni, $municipio, $direccion, $contacto, $codigo_postal, $id_rol_persona);
    if ($id != false) {
        return $id;
    } else {
        return "no se guardo la persona";
    }
}

// Insertar Municipio
function guardarMunicipio($nombre_municipio, $id_departamento) {
    $id = insertarMunicipio($nombre_municipio, $id_departamento);
    if ($id != false) {
        return $id;
    } else {
        return "no se guardo el municipio";

    }
}
// Guardar Empleado
function guardar($id_persona, $id_tipo_empleado, $id_vacacion) {
    $id = insertar($id_persona, $id_tipo_empleado, $id_vacacion);
    if ($id != false) {
        // header("Location:show.php?id=".$id."&msg=prodGuard");
        // header("Location:create.php?msg=emplGuard");
        return $id;
    } else {
        // header("Location:create.php?msg=errorGuard");
        return false;

    }
}

// Para eliminar empleado

function deleteEmpleado($id) {
    $result = deleteEmpleadoModel($id);
    if ($result != false) {
        return true;
    } else {
        // header("Location:show.php?id=".$id);
        return false;

    }
}

// Para mostrar empleado
function showEmpleado($id) {
    $result = showEmpleadoModel($id);
    if ($result != false) {
        return $result;
    } else {
        // header("Location:show.php?id=".$id);
        return false;

    }
}

// Para actualizar Persona
function updatePersona($id, $nombre, $cuit, $dni, $municipio, $direccion, $contacto, $codigo_postal) {
    $response = updatePersonaModel($id, $nombre, $cuit, $dni, $municipio, $direccion, $contacto, $codigo_postal);
    return $response;
}

// Para actualizar Empleado
function updateEmpleado($id, $id_persona, $id_tipo_empleado, $id_vacacion) {
    $id = updateEmpleadoModel($id, $id_persona, $id_tipo_empleado, $id_vacacion);
    // echo $id;
    // die();
    if ($id != false) {
        return $id;
    } else {
        return false;
    }
}


// ================================= Funciones que no se utlizan todavia =======================================

function show($id) {
    $result = showModel($id);
    if ($result != false) {
        return $result;
    } else {
        header("Location:index.php");
    }
}


function indexCategorias() {
    $result = indexCategoriasModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function update($id, $nombre, $cod_prod, $descripcion, $precio, $precio_descuento, $oferta, $categoria, $fecha, $img) {
    $result = updateModel($id, $nombre, $cod_prod, $descripcion, $precio, $precio_descuento, $oferta, $categoria, $fecha, $img);
    if ($result != false) {
        header("Location:show.php?id=".$id);
    } else {
        header("Location:index.php");
    }
}


function borrarDescuentoAll() {
    $result = borrarDescuentoAllModel();
    if ($result != false) {
        header("Location:index.php?funciono=si");
    } else {
        header("Location:index.php?funciono=no");
    }
}


?>

