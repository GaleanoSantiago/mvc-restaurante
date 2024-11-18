<?php
require_once "./../../config/bd.php";


function indexModel() {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM empleados");
    // $stament = $PDO->prepare("SELECT empleados.id_empleado, personas.id_persona, personas.nombre_persona, tipos_empleado.tipo_empleado, personas.cuit_persona, personas.dni_persona, municipios.nombre_municipio, direcciones.direccion, direcciones.codigo_postal, contactos.contacto FROM empleados INNER JOIN personas ON empleados.id_persona = personas.id_persona INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio INNER JOIN direcciones ON personas.id_direccion = direcciones.id_direccion INNER JOIN contactos ON personas.id_contacto = contactos.id_contacto ORDER BY empleados.id_empleado");
    $stament = $PDO->prepare("SELECT empleados.id_empleado, 
                                personas.id_persona, 
                                personas.nombre_persona, 
                                personas.direccion_persona, 
                                personas.contacto_persona, 
                                personas.codigo_postal, 
                                tipos_empleado.tipo_empleado, 
                                personas.cuit_persona, 
                                personas.dni_persona, 
                                municipios.nombre_municipio,
                                vacaciones.fecha_inicio, 
                                vacaciones.fecha_fin 
                            FROM empleados 
                            INNER JOIN personas ON empleados.id_persona = personas.id_persona 
                            INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado 
                            INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio 
                            INNER JOIN vacaciones ON vacaciones.id_vacacion = empleados.id_vacacion 
                            ORDER BY empleados.id_empleado");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}
// Funcion para la lista de empleados agrupados por cargo
function EmpleadosPorCargoModel($date) {
    $PDO = getConnection();
    // $stament = $PDO->prepare("SELECT * FROM empleados");
    if($date){
        $date = date_format(date_create($date), 'Y-m-d');
        $stament = $PDO->prepare("SELECT empleados.id_empleado, personas.id_persona, personas.nombre_persona, tipos_empleado.tipo_empleado, personas.cuit_persona, personas.dni_persona, municipios.nombre_municipio, direcciones.direccion, direcciones.codigo_postal, contactos.contacto,vacaciones.fecha_inicio, vacaciones.fecha_fin FROM empleados INNER JOIN personas ON empleados.id_persona = personas.id_persona INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio INNER JOIN direcciones ON personas.id_direccion = direcciones.id_direccion INNER JOIN contactos ON personas.id_contacto = contactos.id_contacto INNER JOIN vacaciones on vacaciones.id_vacacion= empleados.id_vacacion WHERE vacaciones.fecha_inicio='$date' or vacaciones.fecha_fin='$date'
    ORDER BY tipos_empleado.tipo_empleado, empleados.id_empleado;");
    return ($stament->execute()) ? $stament->fetchAll() : false;
    }
    $stament = $PDO->prepare("SELECT empleados.id_empleado, personas.id_persona, personas.nombre_persona, tipos_empleado.tipo_empleado, personas.cuit_persona, personas.dni_persona, municipios.nombre_municipio, direcciones.direccion, direcciones.codigo_postal, contactos.contacto,vacaciones.fecha_inicio, vacaciones.fecha_fin FROM empleados INNER JOIN personas ON empleados.id_persona = personas.id_persona INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio INNER JOIN direcciones ON personas.id_direccion = direcciones.id_direccion INNER JOIN contactos ON personas.id_contacto = contactos.id_contacto INNER JOIN vacaciones on vacaciones.id_vacacion= empleados.id_vacacion
    ORDER BY tipos_empleado.tipo_empleado, empleados.id_empleado;");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}
// Funcion para mostrar empleados por cargo 
function contEmpleadosPorCargoModel(){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT 
        te.id_tipo_empleado,
        te.tipo_empleado,
        COUNT(e.id_empleado) AS cantidad_registros
    FROM 
        empleados e
    INNER JOIN 
        tipos_empleado te ON e.id_tipo_empleado = te.id_tipo_empleado
    GROUP BY 
        te.id_tipo_empleado, te.tipo_empleado
    ORDER BY 
        te.id_tipo_empleado;
    ");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}
// Insertar direccion
function insertarDireccion($direccion, $cod_postal){
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO direcciones VALUES 
        (NULL, :direccion, :codigo_postal)"
    );
    
    $stament->bindParam(":direccion", $direccion);
    $stament->bindParam(":codigo_postal", $cod_postal);
    
    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}
// Insentar contactos
function insertarContacto($email){
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO contactos VALUES 
        (NULL, :contacto)"
    );
    
    $stament->bindParam(":contacto", $email);
    
    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Insertar personas
function insertarPersona($nombre, $cuit, $dni, $municipio, $direccion, $contacto, $codigo_postal, $id_rol_persona) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO personas VALUES 
        (NULL, :nombre, :cuit, :dni, :municipio, :direccion, 
        :contacto, :codigo_postal, :id_rol_persona)"
    );
    
    $stament->bindParam(":nombre", $nombre);
    $stament->bindParam(":cuit", $cuit);
    $stament->bindParam(":dni", $dni);
    $stament->bindParam(":municipio", $municipio);
    $stament->bindParam(":direccion", $direccion);
    $stament->bindParam(":contacto", $contacto);
    $stament->bindParam(":codigo_postal", $codigo_postal);
    $stament->bindParam(":id_rol_persona", $id_rol_persona);

    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Insertar Municipio
function insertarMunicipio($nombre_municipio, $id_departamento) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO municipios VALUES 
        (NULL, :nombre_municipio, :id_departamento)"
    );
    
    $stament->bindParam(":nombre_municipio", $nombre_municipio);
    $stament->bindParam(":id_departamento", $id_departamento);
    
    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Insertar Empleados
function insertar($id_persona, $id_tipo_empleado, $id_vacacion) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "INSERT INTO empleados VALUES 
        (NULL, :id_persona, :id_tipo_empleado, :id_vacacion)"
    );
    
    $stament->bindParam(":id_persona", $id_persona);
    $stament->bindParam(":id_tipo_empleado", $id_tipo_empleado);
    $stament->bindParam(":id_vacacion", $id_vacacion);
    
    return ($stament->execute()) ? $PDO->lastInsertId() : false;
}

// Para eliminar empleado


function deleteEmpleadoModel($id) {
    $PDO = getConnection();
    $stament = $PDO->prepare("DELETE FROM `personas` WHERE `personas`.`id_persona` = :id");
    $stament->bindParam(":id", $id);
    return ($stament->execute()) ? true : false;
}

// Para mostrar empleado

function showEmpleadoModel($id){
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT empleados.id_empleado, 
                                empleados.id_tipo_empleado,
                                personas.id_persona, 
                                personas.nombre_persona, 
                                personas.direccion_persona, 
                                personas.contacto_persona, 
                                personas.codigo_postal, 
                                tipos_empleado.tipo_empleado, 
                                tipos_empleado.id_tipo_empleado,
                                personas.cuit_persona, 
                                personas.dni_persona, 
                                municipios.nombre_municipio, 
                                municipios.id_municipio,
                                vacaciones.fecha_inicio, 
                                vacaciones.fecha_fin,
                                personas.id_rol_persona 

                            FROM empleados 
                            INNER JOIN personas ON empleados.id_persona = personas.id_persona 
                            INNER JOIN tipos_empleado ON empleados.id_tipo_empleado = tipos_empleado.id_tipo_empleado 
                            INNER JOIN municipios ON personas.id_municipio = municipios.id_municipio
                            INNER JOIN vacaciones ON vacaciones.id_vacacion = empleados.id_vacacion 
                            WHERE empleados.id_empleado = :id
                            ORDER BY empleados.id_empleado limit 1
    ");
    $stament->bindParam(":id", $id);
    return ($stament->execute()) ? $stament->fetchAll() : false;
}

// Actualizar personas
function updatePersonaModel($id, $nombre, $cuit, $dni, $municipio, $direccion, $contacto, $codigo_postal) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "UPDATE personas SET 
        nombre_persona = :nombre, 
        cuit_persona = :cuit, 
        dni_persona = :dni, 
        id_municipio = :municipio, 
        direccion_persona = :direccion, 
        contacto_persona = :contacto, 
        codigo_postal = :codigo_postal 
        WHERE id_persona = :id"
    );
    
    $stament->bindParam(":id", $id);
    $stament->bindParam(":nombre", $nombre);
    $stament->bindParam(":cuit", $cuit);
    $stament->bindParam(":dni", $dni);
    $stament->bindParam(":municipio", $municipio);
    $stament->bindParam(":direccion", $direccion);
    $stament->bindParam(":contacto", $contacto);
    $stament->bindParam(":codigo_postal", $codigo_postal);

    return $stament->execute();
}

// Actualizar empleados
function updateEmpleadoModel($id, $id_persona, $id_tipo_empleado, $id_vacacion) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "UPDATE empleados SET 
        id_persona = :id_persona, 
        id_tipo_empleado = :id_tipo_empleado, 
        id_vacacion = :id_vacacion 
        WHERE id_empleado = :id"
    );
    
    $stament->bindParam(":id", $id);
    $stament->bindParam(":id_persona", $id_persona);
    $stament->bindParam(":id_tipo_empleado", $id_tipo_empleado);
    $stament->bindParam(":id_vacacion", $id_vacacion);

    // return ($stament->execute()) ? $stament->fetchAll() : false;
    return ($stament->execute()) ? $id : false;
    // echo $PDO->lastInsertId();
    // die();
    // return $stament->execute();
}

// ================================= Funciones que no se utlizan todavia =======================================
function lastIdModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT MAX(producto_id) AS id FROM productos");
    return ($stament->execute()) ? $stament->fetch() : false;
}

function showModel($id) {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM productos WHERE producto_id = :id limit 1");
    $stament->bindParam(":id", $id);
    return ($stament->execute()) ? $stament->fetch() : false;
}

function indexCategoriasModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("SELECT * FROM categoria");
    return ($stament->execute()) ? $stament->fetchAll() : false;
}



function updateModel($id, $nombre, $cod_prod, $descripcion, $precio, $precio_descuento, $oferta, $categoria, $fecha, $img) {
    $PDO = getConnection();
    $stament = $PDO->prepare(
        "UPDATE productos SET cnombre_producto = :nombre, cod_producto = :cod_prod, cdescripcion_producto = :descripcion,
        nprecio = :precio, nprecio_descuento = :precio_descuento,
        boferta_especial = :oferta, rela_categoria_id = :categoria, dfecha_alta = :fecha, cimg_prod = :img WHERE producto_id = :id"
    );
    
    $stament->bindParam(":id", $id);
    $stament->bindParam(":nombre", $nombre);
    $stament->bindParam(":cod_prod", $cod_prod);
    $stament->bindParam(":descripcion", $descripcion);
    $stament->bindParam(":precio", $precio);
    $stament->bindParam(":precio_descuento", $precio_descuento);
    $stament->bindParam(":oferta", $oferta);
    $stament->bindParam(":categoria", $categoria);
    $stament->bindParam(":fecha", $fecha);
    $stament->bindParam(":img", $img);
    return ($stament->execute()) ? $id : false;
}

function borrarDescuentoAllModel() {
    $PDO = getConnection();
    $stament = $PDO->prepare("UPDATE productos SET boferta_especial = false, nprecio_descuento = 0");
    return ($stament->execute()) ? true : false;
}

?>