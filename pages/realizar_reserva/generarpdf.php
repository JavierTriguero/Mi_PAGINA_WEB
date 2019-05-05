<?php
session_start();
include('.\include\pdf\fpdf.php');
include('.\include\connection.php'); 
function añadirReserva(){
	$nombre=$_SESSION['nombre'];
	$nom_usuario=$_SESSION['nombre_usuario'];
	$dni=$_SESSION['dni'];
	$email=$_SESSION['email'];
	$numero_pedido=rand(1,1000000);
	$cuerpo_de_reserva=(string)cuerpoReserva();
	//Añado la reserva a la base de datos
	$mysqli=Conexion::conectarBD('localhost','root','','pollosrufino');
    $sql = "INSERT INTO reservas (num_reserva,nombre,nom_usuario,dni,email,cuerpo_reserva)
			VALUES('$numero_pedido', '$nombre', '$nom_usuario','$dni','$email','$cuerpo_de_reserva')";
	$mysqli->query($sql);
    Conexion::desconectarBD($mysqli);
}
function cuerpoReserva(){

	$mysqli=Conexion::conectarBD('localhost','root','','pollosrufino');
	$sql="SELECT * FROM productos WHERE id_product IN ("; 
	foreach($_SESSION['cart'] as $id => $value) { 
		$sql.=$id.","; 
	} 
	  $sql=substr($sql, 0, -1).") ORDER BY cod_prod ASC"; 
	  $res=$mysqli->query($sql);
	  $nombre_producto_reser=(string)"";
	  $cantidad_producto_reser=(string)"";
	  $salida=(string)"";
	while($f=$res->fetch_assoc()){	
		$nombre_producto_reser=(string)$f['cod_prod'];
		$cantidad_producto_reser=(string)$_SESSION['cart'][$f['id_product']]['quantity'];
		$salida.=$nombre_producto_reser.$cantidad_producto_reser." ";	
	}

	return $salida;
}
añadirReserva();
?>
<?php

$nombre=$_SESSION['nombre'];
$nom_usuario=$_SESSION['nombre_usuario'];
$dni=$_SESSION['dni'];
$carrito=$_SESSION['cart'];
$email=$_SESSION['email'];

class PDF extends FPDF
{
// Cabecera de p�gina

function Header()
{
	
	$dia=date("j",time());
	$num_mes=date("n",time());
	$meses=array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
	$mes=$meses[$num_mes-1];
	$any=date("Y",time());
	// Arial bold 13
	$this->Image('descarga.jpg',68,40,75);
	$this->SetFont('Arial','B',13);
	$this->Cell(0,7,utf8_decode('[Tú Reserva]'),'B',0,'C');
	$this->setX(20);
	$this->setFillColor(108,59,42);
	$this->setTextColor(255,255,255);
	$this->Cell(45,7,"$dia de $mes de $any",1,1,'L',true);
	// Salto de l�nea	
	$this->Ln(60);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	
	// Arial italic 8
	$this->SetFont('Helvetica','',15);
	$this->SetLineWidth(0.7);
	$this->setDrawColor(100,100,100);
	$this->Cell(0,10,"","T",0,0);
	$this->setX(20);
	$this->setTextColor(0,0,255);
	$this->SetFont('Courier','B',15);
	$this->Cell(20,10,$this->PageNo(),"R",0,"R");
	
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
	$pdf->SetMargins(20, 30 , 20);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetX(20);
	$pdf->SetFont('Arial','',15);	
	$pdf->setTextColor(255, 51, 51);  
	$pdf->Cell(0,5,'No te olvides de presentar este documento en nuestras tiendas.',0,10,'B',false);
	$pdf->Cell(50,5,'Gracias!',0,10,'B',false);
	$pdf->ln();

		$pdf->SetFont('Arial','',15);
		$pdf->setTextColor(255,255,255);
		$pdf->SetFillColor(160,80,0);
		$pdf->Cell(0,10,'DATOS DE USUARIO: ',1,20,'C',true);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,10,'NOMBRE: '. $nombre.'',0,20);
		$pdf->Cell(0,10,'NOMBRE DE USUARIO: '. $nom_usuario.'',0,20);
		$pdf->Cell(0,10,'DNI: '. $dni.'',0,20);
		$pdf->Cell(0,10,utf8_decode('CORREO ELECTRÓNICO:'). $email.'',0,20);
		$pdf->ln(1);

			$pdf->SetFont('Arial','',15);
			$pdf->setX(20);
			$pdf->setTextColor(255,255,255);
			$pdf->SetFillColor(108,59,42);
			$pdf->Cell(0,10,utf8_decode('TÚ RESERVA CONTIENE:'),0,2,'C',true);
			$pdf->setTextColor(0,0,0);
			$pdf->ln(1);
//Creo la consulta para sacar el nombre del producto,posteriormente.
//La consulta selecciona los productos que su id este en la $_SESSION actual.
      $mysqli=Conexion::conectarBD($server,$user,$pass,$db);
      $sql="SELECT * FROM productos WHERE id_product IN ("; 
      foreach($_SESSION['cart'] as $id => $value) { 
          $sql.=$id.","; 
      } 
    	$sql=substr($sql, 0, -1).") ORDER BY cod_prod ASC"; 
		$res=$mysqli->query($sql);
		$numfilas=$res->num_rows;//Si se necesita mas adelante controlar el número de paginas v2
	$pdf->setX(62);
	$pdf->setTextColor(255,255,255);
	$pdf->SetFillColor(160,80,0);
	$pdf->Cell(50,10,"PRODUCTO",1,0,'C',true);
	$pdf->Cell(50,10,"CANTIDAD",1,0,'C',true);
	$pdf->setTextColor(0,0,0);
	$pdf->Ln();

      while($row=$res->fetch_assoc()){
		$pdf->setX(62); 
		$pdf->Cell(50,5,$row['cod_prod'],1,0,'C',false);
		$pdf->Cell(50,5,$_SESSION['cart'][$row['id_product']]['quantity'],1,0,'C',false);
		$pdf->ln();
} 
Conexion::desconectarBD($res);

$pdf->Output();

?>


