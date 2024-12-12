<?php 

session_start();

$idcliente=$_POST['iduser'];
$nombretxt=$_POST['txtnombre'];
$apellidotxt=$_POST['txtapellido'];
$tipodoc=$_POST['tipodoc'];
$numdoc=$_POST['ndoc'];
$tel=$_POST['telefono'];
$ubigeo=$_POST['ubigeo'];
$direccion=$_POST['direccion'];
$docventa=$_POST['docventa'];
$nota=$_POST['nota'];

if(isset($_SESSION['datostransaction'])){
    $datostransaction= $_SESSION['datostransaction'];
    $statuspago= "Verificado";
    $pago=4;
    
}elseif(!isset($_SESSION['datostransaction']) && $_POST['pago']==4){
    
    $_SESSION['error']=1;
    header("Location: ../Clientes/checkout.php");
    exit();
    
}elseif(!isset($_SESSION['datostransaction']) && $_POST['pago']!=4){
    $datostransaction= null;
    $statuspago="No verificado";
    $pago=$_POST['pago'];
    $_SESSION['carrito2']= $_SESSION['carrito'];
}

if($docventa==1){
    $ruc= NULL;
}elseif($docventa==2){
    $ruc= $_POST['ruc'];
}elseif($docventa==3){
    $ruc= NULL;
}

$validarpedido=1;

require "../Util/ConexionBD.php";

$objc= new ConexionBD();
$conex= $objc->getConexionBD();

/*
if (!$conex->query("SET @msg = ''")){
    echo "ups";
}
*/

$data= array($idcliente,$nombretxt,$apellidotxt,$tipodoc,$numdoc,$tel,$ubigeo,$direccion,$docventa,$pago,$nota, $ruc, $datostransaction, $statuspago);
$records= $conex->prepare("call registrarPedido(?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
$i= $records->execute($data);

//$sql1= "call registrarPedido(\"$idcliente\",\"$nombretxt\",\"$apellidotxt\",\"$tipodoc\"
//,\"$numdoc\",\"$tel\",\"$ubigeo\",\"$direccion\",\"$docventa\",\"$pago\",\"$validarpedido\",@msg)";

//$query = $con->multi_query($sql1);


if ($i==0) {
   
    
    
}else{

    /*
    $sql2= "call selectProductos()";
    clearStoredResults();
    $query2 = $conex->query($sql2);
     */
    $objc= new ConexionBD();
    $conex= $objc->getConexionBD();

    $records2= $conex->prepare("call selectProductos();");
    //clearStoredResults();
    $ii= $records2->execute();
  
    
    //$lista=$query->fetch_array();
 

              //verificamos que nuestra consulta nos regrese algo
             if (($ii) > 0) {
                 //instanciamos todos los produtos que tengamos
                 while($lista= $records2->fetch(PDO::FETCH_ASSOC)){
                     //como en este tenemos un array clave-valor es mas facil que recorra todos los documentos
                     foreach($_SESSION['carrito2'] as $clave => $valor){
                         //verifica que nuestro iventario coicida con algo de nuestra lista para que solo muestre lo de deseemos
                        if($lista['id_producto']==$clave && $valor!=0){

                           $precio=$lista['precio_prod'];

                           //$sql3= "call registrarDetalle(\"$idcliente\",\"$valor\",\"$precio\",\"$clave\"
                           //,\"$idcliente\",\"$idcliente\",\"$pago\",\"$docventa\",\"$numdoc\")";

                            //clearStoredResults();
                           
                            $objc= new ConexionBD();
                            $conex= $objc->getConexionBD();
                            
                            $data22= array($idcliente,$valor,$precio,$clave,$idcliente,$idcliente,$pago,$docventa,$numdoc);
                            $records3= $conex->prepare("call registrarDetalle(?,?,?,?,?,?,?,?,?);");
                            $records3->execute($data22);


                        }
                    }
                }
            
                $resultado=1;
            }else{
                $resultado=2;
            }

    if($resultado==1){
        $_SESSION['exito']=1;
        header("Location: ../Clientes/checkout.php");
    }else{
        $_SESSION['ups']=1;
        header("Location: ../Clientes/checkout.php");
    }
 
}

function clearStoredResults(){
    global $conex;

    do {
         if ($res = $conex->store_result()) {
           $res->free();
         }
        } while ($conex->more_results() && $conex->next_result());        

}


?>