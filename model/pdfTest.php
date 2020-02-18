<?php 
class TestPdf extends FelipheGomez\FPDF {

	function Header()
	{
		// Logo
		$this->Image('/home/admin/web/micuenta.monteverdeltda.com/public_html/public/assets/logo-monteverde.png',10,8,33,0, null,BASE_URL);
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		// Movernos a la derecha
		$this->Cell(80);
		// Título
		$this->Cell(0,10,'Reporte de no ejecutado',0,0,'R', false, '#');
		// Salto de línea
		$this->Ln(30);
	}

	function Footer()
	{
		// To be implemented in your own inherited class
		// Posición a 1,5 cm del final
		$this->SetY(-15);
		// Arial itálica 8
		$this->SetFont('Arial','I',8);
		// Color del texto en gris
		$this->SetTextColor(128);
		// Número de página
		$this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');
	}
	
}