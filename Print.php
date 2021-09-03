
<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include "./fpdf182/fpdf.php";


		if(!isset($_POST['Print'])) 
		{
			die("Sorry, Browser can not be refreshed for data security. Please reprint through reprint form!!");
		}

					$prescriptionID;
					$total_price=0;
				
					
					
					include('./process/connection.php');
						
						
						$payment_id=$_POST['payment_id'];
						$invoice_id=$_POST['invoice_id'];
						$nric=$_POST['nric'];
						$p_name=$_POST['p_name'];
						$total_price=$_POST['total_price'];
						$payment_date=$_POST['payment_date'];
						$payment_amount=$_POST['payment_amount'];
						$payment_status=$_POST['payment_status'];
						$staff_id=$_POST['staff_id'];
						$payment_receipt = $_POST['payment_receipt'];
						
						$sql7="select * from staff where staff_id = '$staff_id' ";
						$res7=$conn->query($sql7);
						while($row7=mysqli_fetch_array ($res7))
						{
							$staff_name = $row7["staff_name"];
						}
						


class PDF extends FPDF
{
	function AddPage($orientation='', $format='')
	{
		if($this->state==0)
		$this->Open();
		$family=$this->FontFamily;
		$style=$this->FontStyle.($this->underline ? 'U' : '');
		$size=$this->FontSizePt;
		$lw=$this->LineWidth;
		$dc=$this->DrawColor;
		$fc=$this->FillColor;
		$tc=$this->TextColor;
		$cf=$this->ColorFlag;
		
		if($this->page>0)
		{
			$this->InFooter=true;
			$this->Footer();
			$this->InFooter=false;
			$this->_endpage();
		}
		$this->_beginpage($orientation,$format);
		$this->_out('2 J');
		$this->LineWidth=$lw;
		$this->_out(sprintf('%.2F w',$lw*$this->k));
		if($family)
			$this->SetFont($family,$style,$size);
		$this->DrawColor=$dc;
		if($dc!='0 G')
			$this->_out($dc);
		$this->FillColor=$fc;
		if($fc!='0 g')
			$this->_out($fc);
		$this->TextColor=$tc;
		$this->ColorFlag=$cf;
		$this->InHeader=true;
		$this->Header();
		$this->InHeader=false;
		if($this->LineWidth!=$lw)
		{
			$this->LineWidth=$lw;
			$this->_out(sprintf('%.2F w',$lw*$this->k));
		}
		if($family)
			$this->SetFont($family,$style,$size);
		if($this->DrawColor!=$dc)
		{
			$this->DrawColor=$dc;
			$this->_out($dc);
		}
		if($this->FillColor!=$fc)
		{
			$this->FillColor=$fc;
			$this->_out($fc);
		}
		$this->TextColor=$tc;
		$this->ColorFlag=$cf;
	}
	function Header()
	{
		global $payment_date,$nric,$payment_receipt,$p_name,$invoice_id,$payment_amount, $staff_name;
		$this->SetFont('Courier','',9);
		$this->setXY(10,10);
		$this->Cell(20,0,'Receipt No.', 0, '0', 'L');
		$this->Cell(10,0,':', 0, '0', 'C');
		$this->Cell(20,0,$payment_receipt, 0, '0', 'L');
		$this->setXY(10,15);
		$this->Cell(20,0,'Date', 0, '0', 'L');
		$this->Cell(10,0,':', 0, '0', 'C');
		$this->Cell(20,0,date('d/m/Y',strtotime($payment_date)), 0, '0', 'L');
		$this->setXY(10,20);
		$this->Cell(20,0,'Patient ID', 0, '0', 'L');
		$this->Cell(10,0,':', 0, '0', 'C');
		$this->Cell(20,0,$nric, 0, '0', 'L');
		
		$this->setXY(10,120);
		$this->Cell(20,0,'Patient Name', 0, '0', 'L');
		$this->Cell(10,0,':', 0, '0', 'C');
		$this->Cell(20,0,$p_name, 0, '0', 'L'); 
		
		$this->setXY(10,125);
		$this->Cell(20,0,'Dr Name', 0, '0', 'L');
		$this->Cell(10,0,':', 0, '0', 'C');
		$this->Cell(20,0,$staff_name, 0, '0', 'L'); 
		

		$this->SetFont('Arial','B',14);
		$this->setXY(130,8);
		$this->Cell(20,0,'Iman DentalCare', 0, '0', 'L');
		$this->SetFont('Courier','',9);
		$this->setXY(130,12);
		$this->MultiCell(80,3,'YOUR SMILE IS OUR PRIORITY', 0, 'L', false);
		$this->setXY(130,21);
		$this->Cell(20,0,'Total payment : '.number_format($payment_amount,2).' RM', 0, '0', 'L');
		$this->SetFont('Courier','',9);
		$this->SetDash(1,1);
		$this->line(10,25,206,25); 
		$this->Ln(20);
	}
	function Footer()
	{
		global $duplicate,$note,$nopagelastx,$cashier;
		
		//$date = date('Y-m-d H:i:s');
		$this->SetY(-7);
		$this->SetDash(1,1);
		$this->line(10,130,206,130); 
		$this->SetFont('Arial','I',7);
		$this->SetXY(10,-4);
		$this->write(0,date('d/m/Y H:i'));
		$this->SetY(-15);
		$last = count($this->pages);
	}
	
	
	function SetDash($black=null, $white=null)
	{
		if($black!==null)
			$s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
		else
			$s='[] 0 d';
		$this->_out($s);
	}
	function header_note()
	{
		global $y,$baris;
		$this->SetFont('Courier','',9);
		$this->setXY(10,27);
		$this->Cell(7,0,'NO', 0, '0', 'L');
		$this->Cell(30,0,'Drug ID', 0, '0', 'C');
		$this->Cell(70,0,'Drug Name', 0, '0', 'C');
		$this->Cell(22,0,'Quantity', 0, '0', 'C');
		$this->Cell(22,0,'Price', 0, '0', 'R');
		$this->SetDash(1,1);
		$this->line(10,30,206,30); 
	}
	

}

		$pdf=new PDF();
		$pdf->SetAutoPageBreak(true,1);
		$pdf->AddPage('P','struck');
		$pdf->AliasNbPages();
		$pdf->header_note();
		$pdf->isFinished = true;
		$default_y = 34;
		$y = $default_y;
		$default_footer = 19;
		$baris = 1;
		$subtotal=0;
		$detail_sale=$payment_id;


		
		
	/*	$pdf->setXY(157,42);
		$pdf->SetFont('Courier','',9);
		$pdf->Cell(10,0,'status : ', 0, '0', 'R');
		$pdf->Cell(30,0,$payment_status, 0, '0', 'R');
		$pdf->setXY(187,$y+8); */
		$pdf->SetFont('Courier','',7);
		$pdf->SetFont('Courier','',9);

			
													$sql5="select * from prescription_detail where prescription_id = 
															(select prescription_id from invoice where invoice_id = '$invoice_id') ";
															
													$res5=$conn->query($sql5);
														$y = 32;
														$baris=1;
														$i =0;
											
													while($row5=mysqli_fetch_array ($res5))
													{
														$sql6= "select * from drugs where drugs_id = '".$row5['drugs_id']."' ";
														$res6=$conn->query($sql6);
													
														
														while($row6=mysqli_fetch_array($res6))
														{
															$i += 1;
															$pdf->setXY(10,$y);
															$pdf->Cell(7,0,$i . '.', 0, '0', 'L');
															$pdf->Cell(30,0,$row6["drugs_id"], 0, '0', 'C');
															$pdf->Cell(70,0,$row6["med_name"], 0, '0', 'C');
															$pdf->Cell(22,0,$row5["quantity"], 0, '0', 'C');
															$pdf->Cell(22,0,number_format($row6["price"],2), 0, '0', 'R');
															$y= $y +5;
															$baris++;
														}
														
													}
													
															$pdf->line(10,$y,206,$y); 
															$pdf->setXY(157,$y+4);
															$pdf->SetFont('Courier','B',9);
															$pdf->Cell(10,0,'Total : ', 0, '0', 'R');
															$pdf->Cell(30,0,number_format($total_price,2).' RM', 0, '0', 'R');
												

$y-=2;

$pdf->Output();
mysqli_close($conn);
?>