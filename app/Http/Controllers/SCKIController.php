<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use FPDF;
use App\Models\Transaction;
Use App\Models\AccForm;
use App\Models\Fund;
use Illuminate\Support\Facades\Date;

class SCKIController extends Controller
{
     public function index(Request  $request)
    {
        $pdf = new FPDF('L', 'mm', 'Legal');
$pdf->AddPage();

$pdf->SetAutoPageBreak(true);
// Get the current month and year
$month = $request->input('month');
  $year = $request->input('year');

  $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));
$date_string = date('F j, ', strtotime($start_date)) . ' - ' . date('j, Y', strtotime($end_date));
  $pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(335, 5, 'SUMMARY OF CHECKS ISSUED', 0, 1, 'C');
  $pdf->SetFont('Arial', 'U', 11);
$pdf->Cell(335, 10, 'For the Month of '. $date_string, 0, 1, 'C');
 $pdf->Rect(10,10,335,12);
  $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10,2,'Barangay: BULILIS, UBAY, BOHOL',0,0); 
          $pdf->Cell(280, 0, 'SCKI No.:   ', 0,0,'R');
             $pdf->Cell(30, 1.1, '', 'B',1,'L');
             $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(0,12,'Barangay Treasurer: ESTRELLA A. CURAY',0,0,'L'); 
        $pdf->Rect(10,22,335,12);
         $pdf->Cell(0,8,'',0,1); 
        $pdf->Cell(20,15,$year, 1, 0, 'C'); 
        $pdf->Cell(25,15, 'Check No.', 1, 0, 'C'); 
        $pdf->Cell(25,15, 'DV No. ', 1, 0, 'C'); 
        $pdf->Cell(15,15, 'Fund ', 1, 0, 'C'); 
        $pdf->Cell(55,15, 'Payee', 1, 0, 'C'); 
        $pdf->Cell(55,15, 'Particulars', 1, 0, 'C');
         $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(20,15, 'Gross Amount', 1, 0,'C');
         $pdf->Cell(100,5, 'DEDUCTIONS ', 1, 0, 'C'); 
         
         $pdf->Cell(20,15, 'Net Amount', 1, 0, 'C'); 
   $pdf->Cell(0,5,'',0,1); 
    $pdf->Cell(215,15,'',0,0);
      $pdf->Cell(100,5, 'DUE TO BIR', 1, 1, 'C'); 
      $pdf->Cell(0,0,'',0,1); 
    $pdf->Cell(215,30,'',0,0);
      $pdf->Cell(20,5, 'CWT 5%', 1, 0, 'C'); 
      $pdf->Cell(20,5, 'CWT 3%', 1, 0, 'C'); 
      $pdf->Cell(20,5, 'EVAT 1', 1, 0, 'C'); 
      $pdf->Cell(20,5, 'EVAT 2', 1, 0, 'C'); 
      $pdf->MultiCell(20,5, 'Witholding Tax', 1, 'C'); 

 $start_date = date("$year-$month-01");
$end_date = date('Y-m-t', strtotime($start_date));
$transactions = Transaction::where('type', 'withdraw')
                           ->whereBetween('date', [$start_date, $end_date])
                           ->orderby('date')
                           ->get();
$total_withdraw =0;
$total_deduction=0;
$withdrawal_amount=0;
$CWT5 = $withdrawal_amount * 0.05;
$CWT3 = $withdrawal_amount * 0.03;
$EVAT1 = $withdrawal_amount * 0.01;
$EVAT2 = $withdrawal_amount * 0.02;
$d_name = ''; // declare and initialize the $d_name variable
foreach($transactions as $withdraw){
  $pdf->SetFont('Arial', '', 8);
  $pdf->Cell(20,5,$withdraw['date'],1,0,'C');
  $pdf->Cell(25, 5, $withdraw['check_no'], 1);
  $pdf->Cell(25,5,$withdraw['dv_no'],1,0,'C');
  $pdf->Cell(15,5,$withdraw['type_of_fund'],1,0,'C');
  $pdf->Cell(55,5,$withdraw['payer_payee'],1,0,'C');
  $pdf->Cell(55,5,$withdraw['particulars'],1,0,'C');
  $pdf->Cell(20,5,$withdraw['amount'],1,0,'C');

  $CWT5 = 0;
  $CWT3 = 0;
  $EVAT1 = 0;
  $EVAT2 = 0;

  if($withdraw['d_name'] == 'CWT 5%'){
    $CWT5 = $withdraw['amount'] * 0.05;
    $pdf->Cell(20,5,$CWT5,1,0,'C');
  } else {
    $pdf->Cell(20,5,'',1,0,'C');
  }

  if($withdraw['d_name'] == 'CWT 3%'){
    $CWT3 = $withdraw['amount'] * 0.03;
    $pdf->Cell(20,5,$CWT3,1,0,'C');
  } else {
    $pdf->Cell(20,5,'',1,0,'C');
  }

  if($withdraw['d_name'] == 'EVAT 1'){
    $EVAT1 = $withdraw['amount'] * 0.01;
    $pdf->Cell(20,5,$EVAT1,1,0,'C');
  } else {
    $pdf->Cell(20,5,'',1,0,'C');
  }

  if($withdraw['d_name'] == 'EVAT 2'){
    $EVAT2 = $withdraw['amount'] * 0.02;
    $pdf->Cell(20,5,$EVAT2,1,0,'C');
  } else {
    $pdf->Cell(20,5,'',1,0,'C');
  }

  $pdf->Cell(20,5,'',1,0,'C');
  $pdf->SetFont('Arial', '', 6);
  $net_amount = $withdraw['amount'] - $CWT5 - $CWT3 - $EVAT1 - $EVAT2;
  $pdf->Cell(20,5,'PHP '.number_format($net_amount, 2),1,0,'C');
  $pdf->Ln();
  $total_withdraw += $withdraw['amount'];
  $total_deduction += $CWT5 + $CWT3 + $EVAT1 + $EVAT2;
}

$total_withdraw_deduction = $total_withdraw - $total_deduction;
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(20,5,'', 1, 0, 'C'); 
$pdf->Cell(25,5, '', 1, 0, 'C'); 
$pdf->Cell(25,5, '', 1, 0, 'C'); 
$pdf->Cell(15,5, '', 1, 0, 'C'); 
$pdf->Cell(55,5, '', 1, 0, 'C'); 
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(55,5, 'Total', 1, 0, 'C');
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(20,5,'PHP '.number_format($total_withdraw, 2),1,0,'C');
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(20,5, '', 1, 0, 'C'); 
$pdf->Cell(20,5, '', 1, 0, 'C'); 
$pdf->Cell(20,5, '', 1, 0, 'C'); 
$pdf->Cell(20,5, '', 1, 0, 'C'); 
$pdf->Cell(20,5, '', 1,0, 'C');
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(20,5,'PHP '.number_format($total_withdraw_deduction, 2),1,0,'C');

$pdf->Ln(); // Moves to the next line after each row

        $pdf->MultiCell(335,5,'  
                                                                                                                                                                                                                                                                                                                                                             PREPARED: 
   
                                                                                                                                                                                                                                                                                                                                                                                                          ESTRELLA A. CURAY
                                                                                                                                                                                                                                                                                                                                                                                                            Barangay Treasurer',1);
 $pdf->Cell(268,15,'',0,0);
$pdf->Cell(30, -5, '', 'B',1,'L');
        $pdf->Output();
        exit;

    }
  }
