<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use FPDF;
use App\Models\Transaction;
Use App\Models\AccForm;
use App\Models\Fund;
use Illuminate\Support\Facades\Date;

class TransmittalController extends Controller
{
    public function index(Request  $request)
    {
        $pdf = new FPDF('P', 'mm', 'Legal');
$pdf->AddPage();

$pdf->SetAutoPageBreak(true);
// Get the current month and year
$month = $request->input('month');
  $year = $request->input('year');

  $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));
        // Query the database to retrieve the relevant data
        $data = DB::table('transactions')
            ->whereBetween('date', [$start_date, $end_date])
            ->get();

$date_string = date('F j, ', strtotime($start_date)) . ' - ' . date('j, Y', strtotime($end_date));

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');

        $pdf->Cell(0, 6, 'City/Municipality of Ubay', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 6, 'BARANGAY BULILIS', 0, 1, 'C');
        $pdf->Rect(10,9,195,19);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'TRANSMITTAL LETTER', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(84, 0, 'Date', 0, 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 15, 'To:', 0, 1, 'L');
        $pdf->Cell(50, 0, 'Municipal Accountant', 0, 1, 'R');
        $pdf->Cell(33, 10, 'LGU-UBAY', 0, 1, 'R');
        $pdf->Cell(0, 13, 'Sir/Madam;', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 11);
        $pdf->MultiCell(0, 5, '         We submit  herewith the following transaction document and reports covering the period  ' .$date_string. ' to wit.', 0);
        $pdf->Rect(10,28,195,58);
         $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(195,5,'A. DISBURSEMENTS VOUCHERS/PAYROLLS',1,'C');
        $pdf->Cell(0,0,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
        $pdf->Cell(32,5,'DV/PAYROLL',1,0,'C');
        $pdf->Cell(32,5,'CHECK',1,0,'C');
        $pdf->Cell(60,10,'PAYEE',1,0,'C');
        $pdf->Cell(29,10,'AMOUNT',1,0,'C');
        $pdf->Cell(42,5,'PB Certification',1,0,'C');
         $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
        $pdf->Cell(16,5,'DATE',1,0,'C');
        $pdf->Cell(16,5,'NO.',1,0,'C');
        $pdf->Cell(16,5,'DATE',1,0,'C');
        $pdf->Cell(16,5,'NO.',1,0,'C');
        $pdf->Cell(89,5,'',0,0); //dummy line ending, height=5(normal row height) width=09 should be invisible 
        $pdf->Cell(17,5,'DATE',1,0,'C');
        $pdf->Cell(25,5,'NO.',1,0,'C');

   $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));
         $transactions = Transaction::where('type', 'withdraw',)
                             ->whereBetween('date', [$start_date, $end_date])
                            ->get();
          $pdf->Cell(89,5,'',0,0);
           $pdf->Ln();
           $total_withdraw=0;
      foreach($transactions as $withdraw){
                $pdf->Cell(16,5,$withdraw[''],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(16,5,$withdraw[''],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(16,5,$withdraw['date'],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(16,5,$withdraw['check_no'],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(60,5,$withdraw['payer_payee'],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(29,5,$withdraw['amount'],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(17,5,$withdraw['date'],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(25,5,$withdraw['pb_no'],1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Ln();
$total_withdraw += $withdraw['amount'];
  }
   $pdf->SetFont('Arial', 'B', 7);
  $pdf->Cell(124,5,'TOTAL',1,0,'R');
    
$pdf->Cell(29,5,'PHP '.number_format($total_withdraw, 2),1,0,'C');
$pdf->Cell(17,5,'',1,0,'C', false, '', 1);
$pdf->Cell(25,5,'',1,0,'C', false, '', 1);
$pdf->Ln();
      
  $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));
         $transactions = Transaction::where('type', 'expense',)
                             ->whereBetween('date', [$start_date, $end_date])
                            ->get();
   $total_expense=0;
      foreach($transactions as $expense){
                $pdf->Cell(16,5,$expense['date'],1,0,'C', false, '', 1, false, 'C', 'true');
                 $pdf->SetFont('Arial', '', 5);
                $pdf->Cell(16,5,$expense['dv_no'],1,0,'C', false, '', 1, false, 'C', 'true');
                 $pdf->SetFont('Arial', '', 7);
                $pdf->Cell(16,5,$expense[''],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(16,5,$expense[''],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(60,5,$expense['payer_payee'],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(29,5,$expense['amount'],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(17,5,$expense[''],1,0,'C', false, '', 1, false, 'C', 'true');
                $pdf->Cell(25,5,$expense[''],1,0,'C', false, '', 1, false, 'C', 'true');

    $pdf->Ln();
    $total_expense += $expense['amount'];
  }
   $pdf->SetFont('Arial', 'B', 7);
  $pdf->Cell(124,5,'TOTAL',1,0,'R');
    
$pdf->Cell(29,5,'PHP '.number_format($total_expense, 2),1,0,'C');
$pdf->Cell(17,5,'',1,0,'C', false, '', 1);
$pdf->Cell(25,5,'',1,0,'C', false, '', 1);
$pdf->Ln();
      
      
$pdf->SetFont('Arial', 'B', 9);
$pdf->MultiCell(195,5,'B. REPORT OF COLLECTION AND DEPOSITS(RCD) Report of Collection and Remittances(RCR) and the duplicate copies of the Ors issued',1,'C');
$pdf->Cell(0,0,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(32,5,'DATE',1,0,'C');
$pdf->Cell(32,5,'RCD/RCR Number',1,0,'C');
$pdf->Cell(60,5,'PAYOR',1,0,'C');
$pdf->Cell(29,5,'DEPOSIT',1,0,'C');
$pdf->Cell(42,5,'AMOUNT',1,0,'C');
$pdf->Ln();

 $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));

// Retrieve all transactions within the month and order them chronologically
$transactions = Transaction::whereBetween('date', [$start_date, $end_date])
                            ->orderBy('date')
                            ->get();

$total_collection = 0;
$total_deposit = 0;
$total_withdraw = 0;
$total_expense = 0;

$pdf->SetFont('Arial', '', 7);

$rcd_totals = array();
$already_outputted = array();

foreach ($transactions as $transaction) {
    switch ($transaction->type) {
        case 'collection':
            if (!isset($rcd_totals[$transaction->rcd_no])) {
                $rcd_totals[$transaction->rcd_no] = $transaction->amount;
            } else {
                $rcd_totals[$transaction->rcd_no] += $transaction->amount;
            }
            $total_collection += $transaction->amount;
            break;
    }
}

foreach ($transactions as $transaction) {
    switch ($transaction->type) {
        case 'collection':
            if (!in_array($transaction->rcd_no, $already_outputted)) {
                $pdf->Cell(32,5,$transaction->date,1,0,'C');
                $pdf->Cell(32,5,'RCD:'.$transaction->rcd_no,1,0,'C');
                $pdf->Cell(60,5,'Various Payor',1,0,'C');
                $pdf->Cell(29,5,'',1,0,'C');
                $pdf->Cell(42,5,number_format($rcd_totals[$transaction->rcd_no], 2),1,0,'C'); 
                $pdf->Ln();
                $already_outputted[] = $transaction->rcd_no;
            }
            break;
            case 'deposit':
            $total_deposit += $transaction->amount;
            $pdf->Cell(32,5,$transaction->date,1,0,'C');
            $pdf->Cell(32,5,$transaction->deposit_slip_no,1,0,'C');
            $pdf->Cell(60,5,$transaction->particulars,1,0,'C');
            $pdf->Cell(29,5,number_format($transaction->amount, 2),1,0,'C');
            $pdf->Cell(42,5,'',1,0,'C');
            $pdf->Ln();
            break;
    }
}




   $pdf->SetFont('Arial', 'B', 7);
  $pdf->Cell(124,5,'TOTAL',1,0,'R');
    
$pdf->Cell(29,5,'PHP '.number_format($total_deposit, 2),1,0,'C');
$pdf->Cell(42,5,'PHP '.number_format($total_collection, 2),1,0,'C');
$pdf->Ln();
// data

       
$pdf->SetFont('Arial', 'B', 9);
$pdf->MultiCell(195,5,'C. OTHER REPORTS',1,'L');
$pdf->Cell(0,0,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'',1,0,'C');
$pdf->Cell(53,5,'',1,0,'C');

$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'LIQUIDATION REPORTS',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'RECORD OF APPROPRIATIONS AND OBLIGATIONS(RAO)',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'STATEMENT OF APPROPRIATION, OBLIGATIONS AND BALANCES(SAOB)',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'BANK STATEMENTS',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'DUPLICATE OFFICIAL RECEIPTS(AF#51)-COA',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'VALIDATED DEPOSIT SLIPS-COA',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'CANCELLED CHECKS',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'SUMMARY OF CHECKS ISSUED',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'CASHBOOK',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'REAI',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 
$pdf->Cell(17,5,'',1,0,'C');
$pdf->Cell(125,5,'REPORT OF THE BANK DEBIT/CREDIT MEMOS',1,0,'L');
$pdf->Cell(53,5,'',1,0,'C');
$pdf->Ln(); 

$pdf->MultiCell(195,5,'Please acknowledge receipt hereof:
                                                                                                                                            Very truly yours,
                                                                                                        
                                                                                                                                            ESTRELLA A. CURAY
                                                                                                                                            Barangay Treasurer
                                                                                              
NOTED:                                                                                            RECEIVED BY:
                      
        HON. EFREN B. SALVADOR                                                                                 LEA MARIE A. SARABOSING,CPA,MPA
            Punong Barangay                                                                                                             Municipal Accountant
                               
                      
cc:office of the city Auditor                                                                 
                                                                                                                                                  Date',1);





        $pdf->Output();
        exit;
}
}
