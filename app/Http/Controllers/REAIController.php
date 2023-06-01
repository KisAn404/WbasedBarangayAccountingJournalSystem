<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use FPDF;
use App\Models\Transaction;
Use App\Models\AccForm;
use App\Models\Fund;
use Illuminate\Support\Facades\Date;
class REAIController extends Controller
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

  $funds = Fund::whereBetween('created_at', [$start_date, $end_date])->get();


// Format the date string
$date_string = date('F j, ', strtotime($start_date)) . ' - ' . date('j, Y', strtotime($end_date));
// $funds = Fund::all();
  $pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(335, 5, 'RECORD OF ESTIMATED AND ACTUAL INCOME', 0, 1, 'C');
  $pdf->SetFont('Arial', 'U', 11);
$pdf->Cell(335, 10, 'For the Month of '. $date_string, 0, 1, 'C');
 $pdf->Rect(10,10,335,12);
  $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10,0,'Barangay: BULILIS, UBAY, BOHOL',0,0); 
        $pdf->Cell(190, 0, 'City/Municipality: UBAY  ', 0,0,'R');
        $pdf->Cell(100, 0, 'REAI No.:   ', 0,0,'R');
        $pdf->Cell(30, 1.1, '', 'B',1,'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(0,10,'Barangay Treasurer: ESTRELLA A. CURAY',0,0,'L'); 
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(190,10, 'Province: BOHOL ', 0, 0, 'R'); 
       $pdf->Rect(10,22,335,11);
          $pdf->Cell(0,7,'',0,1); 
        $pdf->Cell(15,30, 'DATE ', 1, 0, 'C'); 
        $pdf->Cell(40,30, 'PARTICULARS ', 1, 0, 'C'); 
        $pdf->Cell(40,30, 'REFERENCE ', 1, 0, 'C'); 
        $pdf->Cell(240,5, 'INCOME ACCOUNTS ', 1, 0, 'C'); 
        $pdf->Ln();
     $pdf->Cell(95,20,'',0,0);
       $pdf->SetFont('Arial', '', 3);
     $pdf->Cell(20,25, 'NATIONAL TAX ALLOTMENT', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'SHARE ON REAL PROPERTY TAX', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'BUSINESS TAX', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'RENT INCOME', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'OTHER PERMITS&LICENSES', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'SHARE ON COMMUNITY TAX', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'MISCELLANEOUS INCOME', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'OTHER SERVICE INCOME', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'OTHER TAXES/ PERMIT FEE', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'CLEARANCE $ CERTIFICATION FEES', 1, 0, 'C'); 
 $pdf->Cell(20,25, 'SUBSIDY FROM PROV/LGU', 1, 0, 'C'); 
 $pdf->SetFont('Arial', 'B', 10);
 $pdf->Cell(20,25, 'TOTAL ', 1, 0, 'C'); 
 $pdf->SetFont('Arial', '', 7);
 
$pdf->Cell(0,25,'',0,1); 
        $pdf->Cell(55,5, 'A. INCOME ACCOUNTS ', 1, 0, 'L'); 
        $pdf->Cell(40,5, '', 1, 0, 'C');
     $pdf->Cell(.1,20,'',0,0);
       $pdf->SetFont('Arial', '', 8);
foreach($funds as $fund){
     if($fund['src_of_fund'] == 'NATIONAL TAX ALLOTMENT'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  }
     if($fund['src_of_fund'] == 'SHARE ON REAL PROPERTY TAX'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  }
     if($fund['src_of_fund'] == 'BUSINESS TAXES'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  } 
     if($fund['src_of_fund'] == 'RENT INCOME'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  } 
     if($fund['src_of_fund'] == 'OTHER PERMITS AND LICENSES'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  } 
     if($fund['src_of_fund'] == 'SHARE ON COMMUNITY TAX'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  }
     if($fund['src_of_fund'] == 'MISCELLANEOUS TAXES ON GOODS AND SERVICES'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  } 
   if($fund['src_of_fund'] == 'OTHER SERVICES INCOME'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  } 
      if($fund['src_of_fund'] == 'OTHER TAXES / PERMIT FEE'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  } 
}
   foreach($funds as $fund){
   if($fund['src_of_fund'] == 'SUBSIDY FROM PROV. / LGU'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  }
  if($fund['src_of_fund'] == 'CLEARANCES AND CERTIFICATION FEES'){
    $pdf->Cell(20,5,$fund['amount'],1,0,'C');
  } 

}
$pdf->Cell(20,5, '', 1, 0, 'C'); 
$year = date('Y');
  $pdf->Ln();
   $pdf->Cell(15,5, '', 1, 0, 'C'); 
        $pdf->Cell(40,5, 'Annual Budget  '.$year, 1, 0, 'C'); 
        $pdf->Cell(40,5, 'Appropriation Ordinance No.', 1,0,'L');  
$pdf->Cell(.1,20,'',0,0);
       $pdf->SetFont('Arial', '', 8);
      foreach($funds as $fund) {
       
    $pdf->Cell(20,5,$fund[''],1,0,'C');
 
}   
$pdf->Cell(20,5, '', 1, 0, 'C');     
         $year = date('Y');
  $pdf->Ln();
   $pdf->Cell(15,5, '', 1, 0, 'C'); 
        $pdf->Cell(40,5, '', 1, 0, 'C'); 
        $pdf->Cell(40,5,'' .$year . '            series', 1,0,'L');  
        $pdf->Cell(.1,20,'',0,0);
       $pdf->SetFont('Arial', '', 8);
      foreach($funds as $fund) {
       
    $pdf->Cell(20,5,$fund[''],1,0,'C');
 
}   
$pdf->Cell(20,5, '', 1, 0, 'C');      
  $pdf->Ln();
   $pdf->Cell(15,5, '', 1, 0, 'C'); 
        $pdf->Cell(40,5, '', 1, 0, 'C'); 
        $pdf->Cell(40,5,'', 1,0,'L');  
        $pdf->Cell(.1,20,'',0,0);
       $pdf->SetFont('Arial', '', 8);
      foreach($funds as $fund) {
       
    $pdf->Cell(20,5,$fund[''],1,0,'C');
 
}   
$pdf->Cell(20,5, '', 1, 0, 'C');   
$pdf->Ln();
   $pdf->Cell(55,5, 'TOTAL INCOME ESTIMATES', 1, 0, 'C'); 
        $pdf->Cell(40,5, '', 1, 0, 'C'); 
        $pdf->Cell(20,5, '', 1, 0, 'C'); 
        $pdf->Cell(.1,20,'',0,0);
       $pdf->SetFont('Arial', '', 8);
      foreach($funds as $fund) {
       
    $pdf->Cell(20,5,$fund[''],1,0,'C');
 
}   
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
   $pdf->Cell(55,5, 'B. ACTUAL INCOME', 1, 0, 'L'); 
        $pdf->Cell(40,5, '', 1, 0, 'C'); 
        $pdf->Cell(.1,20,'',0,0);
       $pdf->SetFont('Arial', '', 8);
       foreach($funds as $fund){
        if($fund['src_of_fund'] == 'NATIONAL TAX ALLOTMENT'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     }
        if($fund['src_of_fund'] == 'SHARE ON REAL PROPERTY TAX'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     }
        if($fund['src_of_fund'] == 'BUSINESS TAXES'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     } 
        if($fund['src_of_fund'] == 'RENT INCOME'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     } 
        if($fund['src_of_fund'] == 'OTHER PERMITS AND LICENSES'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     } 
        if($fund['src_of_fund'] == 'SHARE ON COMMUNITY TAX'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     }
        if($fund['src_of_fund'] == 'MISCELLANEOUS TAXES ON GOODS AND SERVICES'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     } 
      if($fund['src_of_fund'] == 'OTHER SERVICES INCOME'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     } 
         if($fund['src_of_fund'] == 'OTHER TAXES / PERMIT FEE'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     } 
   }
      foreach($funds as $fund){
      if($fund['src_of_fund'] == 'SUBSIDY FROM PROV. / LGU'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     }
     if($fund['src_of_fund'] == 'CLEARANCES AND CERTIFICATION FEES'){
       $pdf->Cell(20,5,$fund['amount'],1,0,'C');
     } 
   
   }

$pdf->Cell(20,5, '', 1, 0, 'C');   
$pdf->Ln();
$pdf->Cell(95,5, 'CUMULATIVE TOTAL FORWARDED', 1, 0, 'C'); 
$pdf->Cell(.1,20,'',0,0);
$pdf->SetFont('Arial', '', 8);
$cum_forwarded=0;
//$pdf->Cell(20,5,$cum_forwarded,1,0,'C');
foreach($funds as $fund){
  if($fund['src_of_fund'] == 'NATIONAL TAX ALLOTMENT'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
}
  if($fund['src_of_fund'] == 'SHARE ON REAL PROPERTY TAX'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
}
  if($fund['src_of_fund'] == 'BUSINESS TAXES'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
} 
  if($fund['src_of_fund'] == 'RENT INCOME'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
} 
  if($fund['src_of_fund'] == 'OTHER PERMITS AND LICENSES'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
} 
  if($fund['src_of_fund'] == 'SHARE ON COMMUNITY TAX'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
}
  if($fund['src_of_fund'] == 'MISCELLANEOUS TAXES ON GOODS AND SERVICES'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
} 
if($fund['src_of_fund'] == 'OTHER SERVICES INCOME'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
} 
   if($fund['src_of_fund'] == 'OTHER TAXES / PERMIT FEE'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
} 
}
foreach($funds as $fund){
if($fund['src_of_fund'] == 'SUBSIDY FROM PROV. / LGU'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
}
if($fund['src_of_fund'] == 'CLEARANCES AND CERTIFICATION FEES'){
 $pdf->Cell(20,5,$fund['cum_forwarded'],1,0,'C');
} 

}

$pdf->Cell(20,5, '', 1, 0, 'C'); 
$pdf->Ln();
 $total_national=0;
 $total_share=0;
 $total_business=0;
 $total_rent=0;
 $total_permit=0;
 $total_comtax=0;
 $total_mis=0;
 $total_otherservice=0;
 $total_othertaxes=0;
 $total_subsidy=0;
 $total_collection=0;

$total_n=0;
$total_s=0;
$total_busi=0;
$total_r=0;
$total_p=0;
 $total_coms=0;
 $total_mis=0;
 $total_ser=0;
 $total_coll=0;
  $total_subs=0;
 $total_tax=0;

 $total_national=0; 
$total_shares=0;
$total_bus=0;
$total_rents=0;
$total_permits=0;
 $total_com=0;
 $total_misc=0;
 $total_services=0;
 $total_taxes=0;
  $total_col=0;
 $total_sub=0;

$start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));


$transactions = Transaction::where('type', 'collection')
                            ->whereBetween('date', [$start_date, $end_date])
                            ->get();

foreach ($transactions as $collection) {
    $rcd_no = $collection->rcd_no;
    $transaction_date = $collection->date;
    switch ($collection->income_acc) {
        case 'NATIONAL TAX ALLOTMENT':
            $total_national += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, $collection['amount']);
            $pdf->Ln();
            break;
        case  'SHARE ON REAL PROPERTY TAX':
            $total_share += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5,$collection['amount'],1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
            case 'BUSINESS TAXES':
            $total_business += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
             case 'RENT INCOME':
            $total_rent += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
             case 'OTHER PERMITS AND LICENSES':
            $total_permit += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
             case 'SHARE ON COMMUNITY TAX':
            $total_comtax += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
             case 'MISCELLANEOUS TAXES ON GOODS AND SERVICES':
            $total_mis += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
             case 'OTHER SERVICES INCOME':
            $total_otherservice += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
             case 'OTHER TAXES / PERMIT FEE':
            $total_othertaxes += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5,  '',1);
            $pdf->Cell(20, 5,'',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
        
              case 'CLEARANCES AND CERTIFICATION FEES':
            $total_collection += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20,5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5,'',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;
                  case  'SUBSIDY FROM PROV. / LGU':
            $total_subsidy += $collection->amount;
            $pdf->Cell(15, 5, $transaction_date, 1);
            $pdf->Cell(40, 5, 'Various Payor', 1, 0, 'L', false, '', 1, false, 'C', 'true');
            $pdf->Cell(40, 5, 'RCD:' . $rcd_no, 1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Cell(20, 5, $collection['amount'],1);
            $pdf->Cell(20, 5, '',1);
            $pdf->Ln();
            break;

    }
}


   $pdf->Cell(15, 5,'', 1);
    $pdf->Cell(40, 5, 'NTA/IRA ', 1, 0, 'L', false, '', 1, false, 'C', 'true');
    $pdf->Cell(40, 5, 'Allocation' , 1);
foreach ($funds as $fund) {
    $src_of_fund = $fund['src_of_fund'];
    $amount = $fund['amount'];

    if ($src_of_fund === 'NATIONAL TAX ALLOTMENT') {
        $divided_amount = $amount / 12;
        $pdf->Cell(20, 5, round($divided_amount, 2), 1,0,'C');
    } else {
        $pdf->Cell(20, 5, '', 1,);
    }
}
 $pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Ln();
$pdf->Cell(15, 5,'', 1);
$pdf->Cell(40, 5, '', 1, 0, 'L');
$pdf->Cell(40, 5, '' , 1);
foreach($funds as $fund) { 
    $pdf->Cell(20,5,$fund[''],1,0,'C');
}

 $pdf->Cell(20, 5, '', 1, 0, 'C');
 $pdf->Ln();
$pdf->Cell(95, 5, 'ACTUAL INCOME FOR '.$date_string, 1, 0, 'L', false, '', 1, false, 'C', 'true');

foreach ($funds as $fund) {
    $src_of_fund = $fund['src_of_fund'];
    $amount = $fund['amount'];

    if ($src_of_fund === 'NATIONAL TAX ALLOTMENT') {
        $divided_amount = $amount / 12;
        $pdf->Cell(20, 5, round($divided_amount, 2), 1,0,'C');
    }     

       
    }  
            $pdf->Cell(20, 5,$total_share,1);
            $pdf->Cell(20, 5,$total_business,1);
            $pdf->Cell(20, 5,$total_rent,1);
            $pdf->Cell(20, 5, $total_permit,1);
            $pdf->Cell(20, 5, $total_comtax,1);
            $pdf->Cell(20, 5, $total_mis,1);
            $pdf->Cell(20, 5,$total_otherservice,1);
            $pdf->Cell(20, 5,  $total_othertaxes,1);
            $pdf->Cell(20, 5,$total_collection,1);
            $pdf->Cell(20, 5,  $total_subsidy,1);
        
            $pdf->Cell(20, 5,'',1);
 $pdf->Ln();
 
  $pdf->Cell(95, 5, 'CUMULATIVE TOTAL ', 1, 0, 'L', false, '', 1, false, 'C', 'true');

  foreach($funds as $fund){
   if($fund['src_of_fund'] == 'NATIONAL TAX ALLOTMENT'){
    $total_national=$divided_amount+$fund->amount;
    $pdf->Cell(20, 5,number_format($total_national, 2),1);
   }
      if($fund['src_of_fund'] == 'SHARE ON REAL PROPERTY TAX'){
         $total_shares=$total_share+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_shares, 2),1);
  }
   if($fund['src_of_fund'] == 'BUSINESS TAXES'){
         $total_bus=$total_business+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_bus, 2),1);
  }
   if($fund['src_of_fund'] == 'RENT INCOME'){
         $total_rents=$total_rent+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_rents, 2),1);
  }
    if($fund['src_of_fund'] == 'OTHER PERMITS AND LICENSES'){
         $total_permits=$total_permit+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_permits, 2),1);
  }
    if($fund['src_of_fund'] == 'SHARE ON COMMUNITY TAX'){
         $total_com=$total_comtax+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_com, 2),1);
  }
    if($fund['src_of_fund'] == 'MISCELLANEOUS TAXES ON GOODS AND SERVICES'){
         $total_misc=$total_mis+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_misc, 2),1);
  }
   if($fund['src_of_fund'] == 'OTHER SERVICES INCOME'){
         $total_services=$total_otherservice+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_services, 2),1);
  }
     if($fund['src_of_fund'] =='OTHER TAXES / PERMIT FEE'){
         $total_taxes=$total_othertaxes+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_taxes, 2),1);
  }
}
   foreach($funds as $fund){

    if($fund['src_of_fund'] =='CLEARANCES AND CERTIFICATION FEES'){
         $total_col=$total_collection+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_col, 2),1);
  }
    if($fund['src_of_fund'] =='SUBSIDY FROM PROV. / LGU'){
         $total_sub=$total_subsidy+$fund->amount;
        $pdf->Cell(20, 5,number_format($total_sub, 2),1);
  }
}
 $pdf->Cell(20, 5, '', 1, 0, 'C');
 $pdf->Ln();
  $pdf->Cell(95, 5, 'DIFFERENCE FROM ESTIMATED AGAINST ACTUAL INCOME' , 1, 0, 'L', false, '', 1, false, 'C', 'true');
foreach($funds as $fund){
   if($fund['src_of_fund'] == 'NATIONAL TAX ALLOTMENT'){
    $total_n=$total_national-$fund->amount;
    $pdf->Cell(20, 5,number_format($total_n, 2),1);
   }
      if($fund['src_of_fund'] == 'SHARE ON REAL PROPERTY TAX'){
         $total_s=$total_shares-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_s, 2),1);
  }
   if($fund['src_of_fund'] == 'BUSINESS TAXES'){
         $total_busi=$total_bus-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_busi, 2),1);
  }
   if($fund['src_of_fund'] == 'RENT INCOME'){
         $total_r=$total_rents-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_r, 2),1);
  }
    if($fund['src_of_fund'] == 'OTHER PERMITS AND LICENSES'){
         $total_p=$total_permits-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_p, 2),1);
  }
    if($fund['src_of_fund'] == 'SHARE ON COMMUNITY TAX'){
         $total_coms=$total_com-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_coms, 2),1);
  }
    if($fund['src_of_fund'] == 'MISCELLANEOUS TAXES ON GOODS AND SERVICES'){
         $total_mis=$total_misc-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_mis, 2),1);
  }
   if($fund['src_of_fund'] == 'OTHER SERVICES INCOME'){
         $total_ser=$total_services-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_ser, 2),1);
  }
     if($fund['src_of_fund'] =='OTHER TAXES / PERMIT FEE'){
         $total_tax=$total_taxes-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_tax, 2),1);
  }
}
   foreach($funds as $fund){

    if($fund['src_of_fund'] =='CLEARANCES AND CERTIFICATION FEES'){
         $total_coll=$total_col-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_coll, 2),1);
  }
    if($fund['src_of_fund'] =='SUBSIDY FROM PROV. / LGU'){
         $total_subs=$total_sub-$fund->amount;
        $pdf->Cell(20, 5,number_format($total_subs, 2),1);
  }
}
 $pdf->Cell(20, 5, '', 1, 0, 'C');
 $pdf->SetFont('Arial', '', 9);
 $pdf->Ln();

   $month = $request->input('month');
  $year = $request->input('year');
    $start_date = date("$year-$month-01");
    $end_date = date('Y-m-t', strtotime($start_date));

function updatereai($src_of_funds, $cum_forwardeds,$start_date, $end_date) {
    foreach ($src_of_funds as $key => $src_of_fund) {
        Fund::where('src_of_fund', $src_of_fund)
        ->whereBetween('created_at', [$start_date, $end_date])
            ->update(['cum_forwarded' => $cum_forwardeds[$key]]);
    }
}

$src_of_funds = [
    'NATIONAL TAX ALLOTMENT', 
'SHARE ON REAL PROPERTY TAX', 
'BUSINESS TAXES', 
'RENT INCOME', 
'OTHER PERMITS AND LICENSES', 
'SHARE ON COMMUNITY TAX', 
'MISCELLANEOUS TAXES ON GOODS AND SERVICES',
 'OTHER SERVICES INCOME',
 'OTHER TAXES / PERMIT FEE', 
 'CLEARANCES AND CERTIFICATION FEES', 
 'SUBSIDY FROM PROV. / LGU', 
 ];
$cum_forwardeds = [$total_national, 
$total_shares, 
$total_bus,
$total_rents,
$total_permits,
 $total_com, 
 $total_misc, 
 $total_services,
 $total_taxes,
  $total_col,
 $total_sub];

updatereai($src_of_funds, $cum_forwardeds,$start_date, $end_date);

        $pdf->MultiCell(335,5, '      
        
                                                        Prepared:                                                                                                                                                Certified Correct:                                                                                   
                                                                                  ____________________                                                                                                                                       ________________
                                                                                       Name and Signature                                                                                                                                           Barangay Captain',1,'L');

$pdf->Output();
exit;
}

}
