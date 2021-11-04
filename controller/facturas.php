<?php
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Facturas.php");
$facturas = new Facturas();

$body = json_decode(file_get_contents("php://input"),true);
switch($_GET["op"]){

    case "GetFacturas":
        $datos=$facturas->get_facturas();
        echo json_encode($datos);
    break;

    case "GetUno":
        $datos=$facturas->get_factura($body["ID"]);
        echo json_encode($datos);
    break;

    case "InsertFacturas":
        $datos=$facturas->insert_facturas($body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],);
        echo json_encode("factura agregada con exito");
    break;    

    case "UpdateFacturas":
        $datos=$facturas->update_facturas($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"],);
        echo json_encode("datos actualizados con exito");
    break;

    case "DeleteFacturas":
        $datos=$facturas->delete_factura($body["ID"]);
        echo json_encode("La factura fue eliminada con exito");
    break;
}
?>