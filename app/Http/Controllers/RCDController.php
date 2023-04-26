<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use FPDF;
use App\Transaction;
use App\AccForm;
use Illuminate\Support\Facades\Date;

class RCDController extends Controller
{
    public function index(Request $request)
    {
        $pdf = new FPDF('P', 'mm', 'Legal');
        $transactions = Transaction::where('type', 'Collection')
            ->whereDate('date', today())
            ->get();

        $total_amount = $transactions->sum('amount');


        // Get the latest RCD No. from the database
        $latest_rcd_no = DB::table('transactions')->orderBy('rcd_no', 'desc')->value('rcd_no');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(0, 1, 'Report of Collection and Deposit', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50,25,'Name of Barangay Treasurer: ESTRELLA A. CURAY',0,0); 
        $pdf->Cell(120, 25, 'Date: '.now()->format('F d, Y'), 0,0,'R'); // display the current date
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(0,35,'Name of Barangay: BULILIS, UBAY, BOHOL',0,0,'L'); 
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(175.9,35, 'RCD NO: ' . $latest_rcd_no, 0, 0, 'R'); // display the latest RCD No. retrieved from the database
        $pdf->Rect(10,20,190,12);
        $pdf->Ln(21);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(190,5,'A. COLLECTIONS',1,'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(75,5,'OFFICIALS RECEIPT',1,0,'C');
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(45,10,'PAYOR',1,0,'C');
        $pdf->Cell(50,10,'NATURE OF COLLECTIONS',1,0,'C');                                
        $pdf->Cell(20,10,'AMOUNT',1,0,'C'); 
        $pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
        $pdf->Cell(25,5,'DATE',1,0,'C');
        $pdf->Cell(25,5,'FROM',1,0,'C');
        $pdf->Cell(25,5,'TO',1,0,'C');
        $pdf->Ln();
       
        $total_collection = 0;
      
foreach($transactions as $collection) {
    $pdf->Cell(25,5,$collection['date'],1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Cell(25,5,$collection['or_no'],1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Cell(25,5,$collection['to'],1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Cell(45,5,$collection['payer_payee'],1,0,'L', false, '', 1, false, 'C', 'true');
    $pdf->Cell(50,5,$collection['particulars'],1,0,'L', false, '', 1, false, 'C', 'true');
    $pdf->Cell(20,5,$collection['amount'],1,0,'L', false, '', 1, false, 'C', 'true');
    $total_collection += $collection->amount;
    $pdf->Ln();
 
}


  $pdf->Cell(170,5,'TOTAL',1,0,'C');
  $pdf->Cell(20,5,number_format($total_collection, 2),1,0,'L');
  $pdf->Ln();

 //DEPOSITS

    $transactions = Transaction::where('type', 'Deposit')
                          ->whereDate('date', today())
                          ->get();

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(190,5,'B. DEPOSITS',1,'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(63.3,5,'BANK/BRANCH',1,0,'C');
    $pdf->Cell(63.3,5,'REFERENCE',1,0,'C');                                
    $pdf->Cell(63.3,5,'AMOUNT',1,0,'C');

    $pdf->Ln();
    $total_deposit = 0;

    foreach($transactions as $deposit) {
    $pdf->Cell(63.3,5,$deposit['bank_account'],1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Cell(63.3,5,$deposit['deposit_slip_no'],1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Cell(63.3,5,$deposit['amount'],1,0,'L', false, '', 1, false, 'C', 'true');
    $total_deposit += $deposit->amount;
    $pdf->Ln();
    
}
    $pdf->Cell(126.6,5,'TOTAL',1,0,'C');
    $pdf->Cell(63.3,5,number_format($total_deposit, 2),1,0,'L');

//ACCOUNTABILITY FOR ACCOUNTABLE FORMS

    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(190,5,'D.ACCOUNTABILITY FOR ACCOUNTABLE FORMS ',1,'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(30,15,'NAME OF FORM',1,0,'C');
    $pdf->Cell(40,5,'BEGINNING BALANCE',1,0,'C');

    $pdf->Cell(40,5,'RECEIPT',1,0,'C');
    $pdf->Cell(40,5,'ISSUED',1,0,'C');
    $pdf->Cell(40,5,'ENDING BALANCE',1,0,'C');
    $pdf->Cell(0,5,'',0,1); 

    $pdf->Cell(30,5,'',0,0);
    $pdf->Cell(8,10,'QTY',1,0);
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(31.9,5,'Inclusives Serial Nos',1,0,'C');
    
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(8,10,'QTY',1,0);
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(31.7,5,'Inclusives Serial Nos',1,0,'C');

    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(8,10,'QTY',1,0);
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(31.9,5,'Inclusives Serial Nos',1,0,'C');
    
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(8,10,'QTY',1,0);
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(31.9,5,'Inclusives Serial Nos',1,0,'C');

    $pdf->Cell(0,5,'',0,1); 
    $pdf->Cell(158,5,'',0,0);
    $pdf->Cell(17,5,'FROM',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(15,5,'TO',1,0,'C');

    $pdf->Cell(-152,5,'',0,0);
    $pdf->Cell(17,5,'FROM',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(15,5,'TO',1,0,'C');

    $pdf->Cell(7.8,5,'',0,0);
    $pdf->Cell(17,5,'FROM',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(15,5,'TO',1,0,'C');

    $pdf->Cell(8,5,'',0,0);
    $pdf->Cell(17,5,'FROM',1,0,'T');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(15,5,'TO',1,0,'T');

     

    // next line
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 8);

    $pdf->Cell(30,10,'Cash Tickets',1,0,'C');
    $pdf->Cell(8,10,'',1,0,'C');
    $pdf->Cell(17.1,10,'',1,0,'C');
    $pdf->Cell(15,10,'',1,0,'C');
    $pdf->Cell(8,10,'',1,0,'C');
    $pdf->Cell(17,10,'',1,0,'C');
    $pdf->Cell(15,10,'',1,0,'C');
    $pdf->Cell(8,10,'',1,0,'C');
    $pdf->Cell(17,10,'',1,0,'C');
    $pdf->Cell(15,10,'',1,0,'C');
    $pdf->Cell(8,10,'',1,0,'C');
    $pdf->Cell(17,10,'',1,0,'C');
    $pdf->Cell(15,10,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1); 


    // third line
    $acc_forms = AccForm::all();
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 8);

    $pdf->Cell(30, 10, 'Without Money Value', 1, 0, 'C');
foreach ($acc_forms as $acc_form) {
    $pdf->Cell(8, 10, $acc_form->avail_forms, 1, 0, 'C');
    $pdf->Cell(17.1, 10, $acc_form->avail_serialno_from, 1, 0, 'C');
    $pdf->Cell(15, 10, $acc_form->avail_serialno_to, 1, 0, 'C');
    $pdf->Cell(8, 10, $acc_form->avail_forms, 1, 0, 'C');
    $pdf->Cell(17.1, 10, $acc_form->avail_serialno_from, 1, 0, 'C');
    $pdf->Cell(15, 10, $acc_form->avail_serialno_to, 1, 0, 'C');
}

//$date = date('Y-m-d'); // Replace this with the date you want to query

$transactions_count = Transaction::whereDate('date', today())
                ->selectRaw('or_no, count(*) as count')
                ->count();

$pdf->Cell(8, 10, $transactions_count, 1, 0, 'C');

$date = date('Y-m-d'); // Replace this with the date you want to query

$first_or_number = Transaction::where('or_no', '<>', null)
    ->whereDate('created_at', $date)
    ->min('or_no');

$last_or_number = Transaction::where('or_no', '<>', null)
    ->whereDate('created_at', $date)
    ->max('or_no');

$pdf->Cell(17, 10, $first_or_number, 1, 0, 'C');
$pdf->Cell(15, 10, $last_or_number, 1, 0, 'C');

// Calculate the number of remaining forms and serial numbers
$first_serial_number = DB::table('acc_forms')->min('avail_serialno_from');
$last_serial_number = DB::table('acc_forms')->max('avail_serialno_to');

$available_forms = $last_serial_number - $last_or_number;

if ($available_forms > 0) {
    $pdf->Cell(8, 10, $available_forms, 1, 0, 'C');
} else {
    $pdf->Cell(8, 10, "No remaining forms", 1, 0, 'C');
}

$next_or_number = $last_or_number + 1;

if ($next_or_number <= $last_serial_number) {
    $pdf->Cell(17, 10, $next_or_number, 1, 0, 'C');
} else {
    $pdf->Cell(17.1, 10, "No remaining OR numbers", 1, 0, 'C');
}


$pdf->Cell(15,10,$last_serial_number,1,0,'C');

      

    $pdf->Ln(); 
   $pdf->SetFont('Arial', '', 10);
 
    $pdf->MultiCell(190,5,'D. CERTIFICATION 
    I hereby certify that the Report of Collections and Deposits and Accountable Forms including supporting documents are true and correct.
                
                                                  Barangay Treasurer                                          Date',1);
    
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(190,5,'E. ACCOUNTING ENTRIES',1,'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(70,5,'ACCOUNT TITLE',1,0,'C');
    $pdf->Cell(40,5,'ACCOUNT CODE',1,0,'C');
    $pdf->Cell(40,5,'DEBIT',1,0,'C');
    $pdf->Cell(40,5,'CREDIT',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
     $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);
    $pdf->Cell(70,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(40,5,'',1,0,'C');
    $pdf->Cell(0,5,'',0,1);

     $pdf->MultiCell(190,5,'Prepared by:                                                                                                                 Approved by:

                       Barangay Treasurer                                                                                                           Municipal Accountant
   ',0);


        $pdf->Output();
        exit;
    }
}
