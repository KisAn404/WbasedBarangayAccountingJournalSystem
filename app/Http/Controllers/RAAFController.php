<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use FPDF;
use App\Models\Transaction;
Use App\Models\AccForm;
use Illuminate\Support\Facades\Date;

class RAAFController extends Controller
{
   public function index(Request  $request)
    {
$pdf = new FPDF('L', 'mm', 'Legal');
$pdf->SetMargins(20, 10, 20, 10); // 1 inch = 72 points

$pdf->AddPage();

  
// Set the margins to 0.5 inches


// Enable automatic page breaking
$pdf->SetAutoPageBreak(true);
// Get the current month and year
$month = $request->input('month');
  $year = $request->input('year');

  $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));

  $acc_forms = AccForm::whereBetween('created_at', [$start_date, $end_date])->get();

// Format the date string
$date_string = date('F j, Y', strtotime($start_date)) . ' - ' . date('j, Y', strtotime($end_date));
  $pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(335, 5, 'REPORT OF ACCOUNTABILITY FOR ACCOUNTABLE FORMS', 0, 1, 'C');
  $pdf->SetFont('Arial', 'U', 11);
$pdf->Cell(335, 10, 'For the Month of '. $date_string, 0, 1, 'C');
  $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(10,5,'Barangay: BULILIS, UBAY, BOHOL',0,0); 
        $pdf->Cell(171, 5,'City/Municipality: UBAY  ', 0,0,'R');
        $pdf->Cell(98, 5, 'RAAF No.:   ', 0,0,'R');
        $pdf->Cell(30, 4, '', 'B', 1);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(0,8,'Barangay Treasurer: ESTRELLA A. CURAY',0,0,'L'); 
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(170,8, 'Province: BOHOL ', 0, 0, 'R'); 
       $pdf->Rect(20,10,315,25);
       $pdf->Cell(50,6,'',0,1);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,30,'NAME OF FORM',1,0,'C');
    $pdf->Cell(65,8,'BEGINNING BALANCE',1,0,'C');
    $pdf->Cell(65,8,'RECEIPT',1,0,'C');
    $pdf->Cell(65,8,'ISSUED',1,0,'C');
    $pdf->Cell(65,8,'ENDING BALANCE',1,0,'C');

    $pdf->Cell(0,8,'',0,1); 
    $pdf->Cell(55,20,'',0,0); 
    $pdf->Cell(15,22,'QTY',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(50,15,'Inclusives Serial Nos',1,0,'C');

       $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(15,22,'QTY',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(49.8,15,'Inclusives Serial Nos',1,0,'C');

     $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(15,22,'QTY',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(49.8,15,'Inclusives Serial Nos',1,0,'C');

     $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(15,22,'QTY',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(49.8,15,'Inclusives Serial Nos',1,0,'C');

    $pdf->Cell(0,15,'',0,1); 
    $pdf->Cell(222,20,'',0,0);

    $pdf->Cell(-152,5,'',0,0);
    $pdf->Cell(25,7,'FROM',1,0,'C');
    $pdf->Cell(.10,10,'',0,0);
    $pdf->Cell(25,7,'TO',1,0,'C');


    $pdf->Cell(15,5,'',0,0);
   $pdf->Cell(25,7,'FROM',1,0,'C');
    $pdf->Cell(.10,10,'',0,0);
    $pdf->Cell(25,7,'TO',1,0,'C');

    $pdf->Cell(15,5,'',0,0);
     $pdf->Cell(25,7,'FROM',1,0,'C');
    $pdf->Cell(.10,10,'',0,0);
    $pdf->Cell(25,7,'TO',1,0,'C');

     $pdf->Cell(15,5,'',0,0);
     $pdf->Cell(25,7,'FROM',1,0,'C');
    $pdf->Cell(.10,10,'',0,0);
    $pdf->Cell(24.7,7,'TO',1,0,'C');

    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(55,7,'A. With Money Value',1,0,'L');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 
  $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,7,'',1,0,'L');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 
  $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,7,'',1,0,'L');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 
  $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,7,'',1,0,'L');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 
  $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,7,'',1,0,'L');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 
  $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,7,'',1,0,'L');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 

//WITHOUT MONEY VALUE
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(55,7,'A. Without Money Value',1,0,'L');
  $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));
  $acc_form = AccForm::where('form_name', 'Official Receipts')
                           ->whereBetween('created_at', [$start_date, $end_date])
                           ->orderby('created_at')
                           ->get();

$issued_forms = $request->input('avail_forms');
$pdf->SetFont('Arial', '', 8);

foreach ($acc_form as $form) {
    if ($issued_forms >= 0) {
    $issued_forms = $form->remain_avail_forms + 1;
    $forms = $form->remain_avail_serialno_from - 1;

    $form->avail_forms = $issued_forms;
    $form->avail_serialno_from = $forms;

    $pdf->Cell(15, 7, $form->avail_forms, 1, 0, 'C');
    $pdf->Cell(25, 7, $form->remain_avail_serialno_from, 1, 0, 'C');
    $pdf->Cell(25.1, 7, $form->remain_avail_serialno_to, 1, 0, 'C');
    $pdf->Cell(15, 7,'-', 1, 0, 'C');
    $pdf->Cell(25, 7,'-', 1, 0, 'C');
    $pdf->Cell(25.1, 7, '-', 1, 0, 'C');
  
}
}
// WITHOUT MONEY VALUE - ISSUED
$start_date = date("$year-$month-01");
$end_date = date('Y-m-t', strtotime($start_date));
 $acc_form = AccForm::where('form_name', 'Official Receipts')
                           ->whereBetween('created_at', [$start_date, $end_date])
                           ->orderby('created_at')
                           ->get();
foreach ($acc_form as $form) {
    // Calculate the serial numbers for the issued forms
    $issued_forms = $form->remain_avail_forms + 1;
    $forms = $form->remain_avail_serialno_from - 1;

    // Update the available forms and serial numbers
    $form->avail_forms = $issued_forms;
    $form->avail_serialno_from = $forms;

    // Output the form details to the PDF
    $pdf->Cell(15, 7, $form->avail_forms, 1, 0, 'C');
    $pdf->Cell(25, 7, $form->remain_avail_serialno_from, 1, 0, 'C');
    $pdf->Cell(25.1, 7, $form->remain_avail_serialno_to, 1, 0, 'C');
    $pdf->Cell(15, 7,'-', 1, 0, 'C');
    $pdf->Cell(25, 7,'-', 1, 0, 'C');
    $pdf->Cell(25.1, 7, '-', 1, 0, 'C');
      $pdf->Ln();
}

// OFFICIAL RECEIPTS 
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(55,7,'Official Receipts',1,0,'C');
$$start_date = date("$year-$month-01");
$end_date = date('Y-m-t', strtotime($start_date));
$acc_form = AccForm::where('form_name', 'Official Receipts')
                           ->whereBetween('created_at', [$start_date, $end_date])
                           ->orderby('created_at')
                           ->get();
$issued_forms = $request->input('avail_forms');
$pdf->SetFont('Arial', '', 8);
foreach($acc_form as $acc_form){
$pdf->Cell(15, 7, $acc_form->avail_forms, 1, 0, 'C');
$pdf->Cell(25, 7, $acc_form->avail_serialno_from, 1, 0, 'C');
$pdf->Cell(25.1, 7, $acc_form->avail_serialno_to, 1, 0, 'C');
$pdf->Cell(15.1, 7,'-', 1, 0, 'C');
$pdf->Cell(25, 7,'-', 1, 0, 'C');
$pdf->Cell(25.1, 7, '-', 1, 0, 'C');
}
$transactions_count = Transaction::where('or_no', '<>', null)
               ->whereDate('date', '>=', $start_date)
                          ->whereDate('date', '<=', $end_date)
                ->selectRaw('count(distinct or_no) as count')
                ->value('count');
                
$pdf->Cell(15, 7, $transactions_count, 1, 0, 'C');

$first_or_number = Transaction::where('or_no', '<>', null)
   ->whereDate('date', '>=', $start_date)
    ->whereDate('date', '<=', $end_date)
    ->orderby('date')
    ->min('or_no');

$last_or_number = Transaction::where('or_no', '<>', null)
    ->whereDate('date', '>=', $start_date)
    ->whereDate('date', '<=', $end_date)
    ->max('or_no');

$pdf->Cell(25, 7, $first_or_number, 1, 0, 'C');
$pdf->Cell(25, 7, $last_or_number, 1, 0, 'C');


$first_or_number = AccForm::where('form_name', 'Official Receipts')->min('avail_serialno_from');
$last_serial_number= AccForm::where('form_name', 'Official Receipts')->max('avail_serialno_to');
$last_or_number = Transaction::where('or_no', '<>', null)
    ->whereDate('date', '>=', $start_date)
    ->whereDate('date', '<=', $end_date)
    ->orderby('date')
    ->max('or_no');

$available_forms = $last_serial_number - $last_or_number;

if ($available_forms > 0) {
    $pdf->Cell(14.9, 7, $available_forms, 1, 0, 'C');
} else {
    $pdf->Cell(15, 7, "-", 1, 0, 'C');
}

$next_or_number = $last_or_number + 1;

if ($next_or_number <= $last_serial_number) {
    $pdf->Cell(25, 7, $next_or_number, 1, 0, 'C');
} else {
    $pdf->Cell(25, 7, "-", 1, 0, 'C');
}

$pdf->Cell(25, 7, $last_serial_number, 1, 0, 'C');
    $pdf->Ln(); 
 
    // NEXT LINE
      $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 
    
     $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,7,'Checks',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 
  $pdf->SetFont('Arial', 'B', 10);

  $pdf->Cell(55,7,'LBP-TALIBON',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 

//CHECKS - DBP-UBAY
  $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(55,7,'DBP-UBAY',1,0,'C');
//$acc_form = AccForm::where('form_name', 'DBP-Ubay')->first();
$start_date = date("$year-$month-01");
$end_date = date('Y-m-t', strtotime($start_date));
$acc_form = AccForm::where('form_name', 'DBP-Ubay')
                           ->whereBetween('created_at', [$start_date, $end_date])
                           ->orderby('created_at')
                           ->get();
$issued_forms = $request->input('avail_forms');
$pdf->SetFont('Arial', '', 8);
foreach($acc_form as $acc_form){
$pdf->Cell(15, 7, $acc_form->avail_forms, 1, 0, 'C');
$pdf->Cell(25, 7, $acc_form->avail_serialno_from, 1, 0, 'C');
$pdf->Cell(25.1, 7, $acc_form->avail_serialno_to, 1, 0, 'C');
$pdf->Cell(15.1, 7,'-', 1, 0, 'C');
$pdf->Cell(25, 7,'-', 1, 0, 'C');
$pdf->Cell(25.1, 7, '-', 1, 0, 'C');
}
$transactions_count = Transaction::where('check_no', '<>', null)
                           ->whereDate('date', '>=', $start_date)
                           ->whereDate('date', '<=', $end_date)
                           ->selectRaw('count(distinct check_no) as count')
                           ->value('count');
                
$pdf->Cell(15, 7, $transactions_count, 1, 0, 'C');

$first_or_number = Transaction::where('check_no', '<>', null)
   ->whereDate('date', '>=', $start_date)
    ->whereDate('date', '<=', $end_date)
    ->orderby('date')
    ->min('check_no');

$last_or_number = Transaction::where('check_no', '<>', null)
    ->whereDate('date', '>=', $start_date)
    ->whereDate('date', '<=', $end_date)
    ->max('check_no');

$pdf->Cell(25, 7, $first_or_number, 1, 0, 'C');
$pdf->Cell(25, 7, $last_or_number, 1, 0, 'C');


$first_or_number = AccForm::where('form_name', 'DBP-Ubay')->min('avail_serialno_from');
$last_serial_number= AccForm::where('form_name', 'DBP-Ubay')->max('avail_serialno_to');
$last_or_number = Transaction::where('check_no', '<>', null)
    ->whereDate('date', '>=', $start_date)
    ->whereDate('date', '<=', $end_date)
    ->orderby('date')
    ->max('check_no');

$available_forms = $last_serial_number - $last_or_number;

if ($available_forms > 0) {
    $pdf->Cell(14.9, 7, $available_forms, 1, 0, 'C');
} else {
    $pdf->Cell(15, 7, "-", 1, 0, 'C');
}

$next_or_number = $last_or_number + 1;

if ($next_or_number <= $last_serial_number) {
    $pdf->Cell(25, 7, $next_or_number, 1, 0, 'C');
} else {
    $pdf->Cell(25, 7, "-", 1, 0, 'C');
}

$pdf->Cell(25, 7, $last_serial_number, 1, 0, 'C');
    $pdf->Ln(); 
  function updateBalance($available_forms,$next_or_number,$last_serial_number) {
  AccForm::where('form_name', 'DBP-Ubay')->update(['remain_avail_forms' => $available_forms, 'remain_avail_serialno_from'=> $next_or_number ,  'remain_avail_serialno_to'=> $last_serial_number]);
} 
    updateBalance($available_forms,$next_or_number,$last_serial_number);




  $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(55,7,'',1,0,'L');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15.1,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(15,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(25,7,'',1,0,'C');
    $pdf->Cell(14.9,7,'',1,0,'C');
    $pdf->Cell(25.1,7,'',1,0,'C');
    $pdf->Cell(24.9,7,'',1,0,'C');
    $pdf->Cell(0,7,'',0,1); 

  $pdf->SetFont('Arial', '', 12);
  
    $pdf->MultiCell(315.3,8,'D. CERTIFICATION 
    I hereby certify that the foregoing is a true statement of all accountable forms recieved, issued and transferred by me during the above-stated period and the correctness of the beginning balances.
    
                
                                                                                                                  Barangay Treasurer                                          Date',1);




    

  
    
       $pdf->Output();
       exit;
}
}