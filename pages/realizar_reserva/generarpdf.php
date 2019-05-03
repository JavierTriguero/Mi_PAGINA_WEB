<?php
include('.\include\pdf\fpdf.php');
session_start();
include('.\include\connection.php');
$nombre=$_SESSION['nombre'];
$nom_usuario=$_SESSION['nombre_usuario'];
$dni=$_SESSION['dni'];
$carrito=$_SESSION['cart'];
class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
    $numero_pedido=rand(1,1000);
	$dia=date("j",time());
	$num_mes=date("n",time());
	$meses=array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
	$mes=$meses[$num_mes-1];
	$any=date("Y",time());
	// Arial bold 15
	$this->SetFont('Arial','B',13);
	$this->Cell(0,7,'[Reserva N:'.$numero_pedido.']','B',0,'C');
	$this->setX(-65);
	$this->setFillColor(160,80,0);
	$this->setTextColor(255,255,255);
	$this->Cell(0,7,"$dia de $mes de $any",1,1,'L',true);
	// Salto de l�nea	
	$this->Ln(20);
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
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,5,'NOMBRE: '. $nombre.'',0,1);
    $pdf->Cell(0,5,'NOMBRE DE USUARIO '. $nom_usuario.'',0,1);
    $pdf->Cell(0,5,'DNI: '. $dni.'',0,1);
	$pdf->ln(20);
	$pdf->SetFont('Arial','',15);
	$pdf->setX(15);
	$pdf->Cell(0,20,'Tu reserva contiene',0,0);
	$pdf->Image('descarga.jpg',60,140,100);
    $pdf->SetFont('Times','IU',20);
  
        $mysqli=Conexion::conectarBD($server,$user,$pass,$db);
        $sql="SELECT * FROM productos WHERE id_product IN ("; 
        $pdf->setX(50);

        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY cod_prod ASC"; 
        $res=$mysqli->query($sql);
        while($row=$res->fetch_assoc()){ 
              
       $pdf->Cell(0,20,$row['cod_prod'],0,0);
   
    
	$pdf->Cell(0,30,$_SESSION['cart'][$row['id_product']]['quantity'],0,0);

    
              
        } 
    Conexion::desconectarBD($res);
   // $pdf->Cell(0,5,'carrito: '. $carrito['cod_prod'].'',0,1);
   // $pdf->Cell(0,5,'NOMBRE DE USUARIO '. $nom_usuario.'',0,1);
   // $pdf->Cell(0,5,'DNI: '. $dni.'',0,1);
	//$pdf->setXY(0,230);
	//$pdf->Cell(0,10,'POLLOS RUFINO',0,0,"C");

$pdf->Output();
?>
