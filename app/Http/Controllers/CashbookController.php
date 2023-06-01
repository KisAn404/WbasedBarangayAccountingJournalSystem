<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use FPDF;
use App\Models\Transaction;
use App\Models\Fund;
Use App\Models\AccForm;
use App\Models\Bank; // Add this line to import the Bank model
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class CashbookController extends Controller
{
 public function index(Request  $request)
    {
           
      $pdf = new FPDF('L', 'mm', 'Legal');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true);
$month = $request->input('month');
  $year = $request->input('year');

  $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));
        // Query the database to retrieve the relevant data
        $data = DB::table('transactions')
            ->whereBetween('date', [$start_date, $end_date])
            ->get();

// Format the date string
$date_string = date('F j, ', strtotime($start_date)) . ' - ' . date('j, Y', strtotime($end_date));
  $pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(335, 8, 'C A S H B O O K', 1, 1, 'C');
 $pdf->Rect(10,10,335,23);
  $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10,5,'Barangay: BULILIS, UBAY, BOHOL',0,0); 
        $pdf->Cell(178, 5, 'City/Municipality: UBAY  ', 0,0,'R');
        $pdf->Cell(100, 5, 'Page:   '.$pdf->PageNo() . ' of {nb}', 0,0,'R');
       
        $pdf->Cell(100,-4,'',0,1); 
       
  $pdf->Cell(10, 4, '', 'B',1,'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(0,15,'Barangay Treasurer: ESTRELLA A. CURAY',0,0,'L'); 
        $pdf->Cell(0,0,'',0,1); 
        $pdf->Cell(178,15, 'Province: BOHOL ', 0, 0, 'R'); 
         $pdf->Cell(0,5,'',0,1); 
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0,15,'Period Cover:     '.$month,0,0,'L');  
      $pdf->Cell(0,10,'',0,1); 
         $pdf->Cell(18,30, 'DATE ', 1, 0, 'C'); 
        $pdf->Cell(50,30, 'PARTICULARS ', 1, 0, 'C'); 
        $pdf->SetFont('Arial', '', 8);

        $pdf->Cell(30,30, 'REFERENCE ', 1, 0, 'C'); 
    $pdf->Cell(60,8,'Cash in Local Treasury',1,0,'C');
    $pdf->Cell(60,8,'Cash in Bank',1,0,'C');
    $pdf->Cell(60,8,'Cash Advance',1,0,'C');
    $pdf->Cell(57,8,'Petty Cash Fund',1,0,'C');

    //cash in local treasury
        $pdf->Cell(0,8,'',0,1); 
    $pdf->Cell(98,20,'',0,0); 
    $pdf->Cell(21,10,'Collection',1,0,'C');
    $pdf->Cell(21,10,'Deposit',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(18,22,'Balance',1,0,'C');

     $pdf->Cell(0,10,'',0,1); 
    $pdf->Cell(250,0,'',0,0);

    $pdf->Cell(-152,5,'',0,0);
    $pdf->Cell(21,12,'(In)',1,0,'C');
    $pdf->Cell(.10,10,'',0,0);
    $pdf->Cell(21,12,'(Out)',1,0,'C');

    //cash in bank
 $pdf->Cell(0,-10,'',0,1); 
    $pdf->Cell(158,0,'',0,0); 
    $pdf->Cell(20,10,'Deposit',1,0,'C');
    $pdf->Cell(20,10,'Check Issued',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(20,22,'Balance',1,0,'C');

     $pdf->Cell(0,10,'',0,1); 
    $pdf->Cell(310,0,'',0,0);

    $pdf->Cell(-152,5,'',0,0);
    $pdf->Cell(20,12,'(In)',1,0,'C');
    $pdf->Cell(.10,10,'',0,0);
    $pdf->Cell(20,12,'(Out)',1,0,'C');

    //cash advance
 $pdf->Cell(0,-10,'',0,1); 
    $pdf->Cell(218,0,'',0,0); 
    $pdf->Cell(20,22,'Receipt',1,0,'C');
    $pdf->Cell(20,22,'Disbursements',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(20,22,'Balance',1,0,'C');

    
    //petty cash fund
 $pdf->Cell(0,0,'',0,1); 
    $pdf->Cell(278,0,'',0,0); 
        $pdf->SetFont('Arial', '', 5);
    $pdf->Cell(21,22,'Receipt/Replenishment',1,0,'C');
        $pdf->SetFont('Arial', '', 8);

    $pdf->Cell(18,22,'Payments',1,0,'C');
    $pdf->Cell(.10,5,'',0,0);
    $pdf->Cell(18,22,'Balance',1,0,'C');
      $pdf->Ln();
// Get the input as_of date from the request
$asOfDate = $request->input('as_of');

// Get the banks where as_of date is less than or equal to the input as_of date
$banks = Bank::whereDate('as_of', '=', $asOfDate)
            ->orderBy('as_of')
            ->get();

// Get the beginning balance for the DBP-Ubay account where the as_of date is equal to the current month
$begBal = Bank::where('bank_acc', 'DBP-Ubay')
              ->whereBetween('as_of', [$start_date, $end_date])
            // ->whereMonth('as_of', Carbon::now()->month)
            ->value('beg_bal');

// Generate the PDF table with the updated columns
$pdf->Cell(18,5,'',1,0,'C');
$pdf->Cell(50,5,'Forwarded Balance:'.$year,1,0,'C');
$pdf->Cell(30, 5, '', 1);
$pdf->Cell(21,5,'',1,0,'C');
$pdf->Cell(21,5,'',1,0,'C');
$pdf->Cell(18,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,$begBal,1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(21,5,'',1,0,'C');
$pdf->Cell(18,5,'',1,0,'C'); // Add the beg_bal column for DBP-Ubay
$pdf->Cell(18,5,'',1,0,'C');
$pdf->Ln();


  $start_date = date("$year-$month-01");
  $end_date = date('Y-m-t', strtotime($start_date));
        // Query the database to retrieve the relevant data
        $transactions = DB::table('transactions')
            ->whereBetween('date', [$start_date, $end_date])
            ->orderBy('date')
            ->get();

$total_collection = 0;
$total_deposit = 0;
$total_withdraw = 0;
$minus_withdraw = 0;
$total_expense = 0;
$total_advance=0;
$endbal=0;
   $total_deposit_dbp=0;
    $forwarded_balance_dbp =0;
 $bal=0;
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
             $total_collection += $transaction->amount;
            if (!in_array($transaction->rcd_no, $already_outputted)) {
                $pdf->Cell(18,5,$transaction->date,1,0,'L');
                $pdf->Cell(50,5,'Various Payor',1,0,'L');
                $pdf->Cell(30, 5, 'RCD:' . $transaction->rcd_no, 1);
                $pdf->Cell(21,5,number_format($rcd_totals[$transaction->rcd_no], 2),1,0,'L');
                $pdf->Cell(21,5,number_format(0, 2),1,0,'C'); // add new column for cash in local treasury debit side
                $balance =  $rcd_totals[$transaction->rcd_no] -0; // calculate balance
                $pdf->Cell(18,5,number_format($balance, 2),1,0,'C'); // display balance
                $pdf->Cell(20,5,'',1,0,'C');
                $pdf->Cell(20,5,'',1,0,'C');
                $pdf->Cell(20,5,'',1,0,'C');
                $pdf->Cell(20,5,'',1,0,'C');
                $pdf->Cell(20,5,'',1,0,'C');
                $pdf->Cell(20,5,'',1,0,'C');
                $pdf->Cell(21,5,'',1,0,'C');
                $pdf->Cell(18,5,'',1,0,'C');
                $pdf->Cell(18,5,'',1,0,'C');
                $pdf->Ln();
                $already_outputted[] = $transaction->rcd_no;
            
            }
            break;
         
   case 'deposit':
    if($transaction->bank_account === 'DBP-Ubay'){
        $total_deposit_dbp += $transaction->amount;
        if ($total_collection > 0) {
            $credit = min($total_collection, $transaction->amount);
            $total_collection -= $credit;
            $debit = $transaction->amount - $credit;
        } else {
            $credit = $transaction->amount;
            $debit = 0;
        }
        $endbal = $begBal - $total_withdraw + $total_deposit_dbp;
         $forwarded_balance_dbp += $credit;
        $pdf->Cell(18,5,$transaction->date,1,0,'L');
        $pdf->Cell(50,5,$transaction->particulars,1,0,'L');
        $pdf->Cell(30,5,$transaction->deposit_slip_no,1,0,'L');
        $pdf->Cell(21,5,'',1,0,'C');
        $pdf->Cell(21,5,number_format($credit, 2),1,0,'C');
        $pdf->Cell(18,5,number_format($debit, 2),1,0,'C');
        $pdf->Cell(20,5,number_format($credit, 2),1,0,'C');
        $pdf->Cell(20,5,'',1,0,'C');
        $pdf->Cell(20,5,number_format($endbal, 2),1,0,'C');
        $pdf->Cell(20,5,'',1,0,'C');
        $pdf->Cell(20,5,'',1,0,'C');
        $pdf->Cell(20,5,'',1,0,'C'); 
        $pdf->Cell(21,5,'',1,0,'C');
        $pdf->Cell(18,5,'',1,0,'C');
        $pdf->Cell(18,5,'',1,0,'C');
        $pdf->Ln();
    } elseif($transaction->bank_account === 'LBP-Talibon') {
        if ($total_collection > 0) {
            $credit = min($total_collection, $transaction->amount);
            $total_collection -= $credit;
            $debit = $transaction->amount - $credit;
        } else {
            $credit = $transaction->amount;
            $debit = 0;
        }
        $pdf->Cell(18,5,$transaction->date,1,0,'L');
        $pdf->Cell(50,5,$transaction->particulars,1,0,'L');
        $pdf->Cell(30,5,$transaction->deposit_slip_no,1,0,'L');
        $pdf->Cell(21,5,'',1,0,'C');
        $pdf->Cell(21,5,number_format($credit, 2),1,0,'C');
        $pdf->Cell(18,5,number_format($debit, 2),1,0,'C');
        $pdf->Cell(20,5,number_format($credit, 2),1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C'); 
    $pdf->Cell(21,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Ln();
    }
    break;

      case 'withdraw':
    $total_withdraw += $transaction->amount;
    $endbal = $begBal - $total_withdraw + $total_deposit_dbp;
    $pdf->Cell(18,5,$transaction->date,1,0,'L');
    $pdf->Cell(50,5,$transaction->payer_payee,1,0,'L');
    $pdf->Cell(30,5,'Check#'.$transaction->check_no,1,0,'L');
    $pdf->Cell(21,5,'',1,0,'C');
    $pdf->Cell(21,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,number_format($transaction->amount, 2),1,0,'C');
    $pdf->Cell(20,5,number_format($endbal, 2),1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,number_format($total_withdraw - $total_expense, 2),1,0,'C');
    $pdf->Cell(21,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Ln();

    break;
case 'expense':
    $total_expense += $transaction->amount;
    $pdf->Cell(18,5,$transaction->date,1,0,'L', false, '', 1, false, 'L', 'true');
    $pdf->Cell(50,5,$transaction->payer_payee,1,0,'L', false, '', 1, false, 'L', 'true'); 
    $pdf->Cell(30,5,'DV#'.$transaction->dv_no,1,0,'L', false, '', 1, false, 'L', 'true');          
    $pdf->Cell(21,5,'',1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Cell(21,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,number_format($transaction->amount, 2),1,0,'C');
   $pdf->Cell(20,5,number_format($total_withdraw - $total_expense, 2),1,0,'C');
    $pdf->Cell(21,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Ln();
    break;

    }
}
$last_cash=$total_withdraw - $total_expense;
$pdf->Cell(18,5,$end_date,1,0,'L', false, '', 1, false, 'L', 'true');
    $pdf->Cell(50,5,'TOTAL',1,0,'L', false, '', 1, false, 'L', 'true'); 
    $pdf->Cell(30,5,'',1,0,'L', false, '', 1, false, 'L', 'true');       
    $pdf->Cell(21,5,$total_collection,1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Cell(21,5, $total_deposit_dbp,1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Cell(20,5,$total_deposit_dbp,1,0,'C');
    $pdf->Cell(20,5,$total_withdraw,1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,$total_expense,1,0,'C');
   $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(21,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Ln();
    $last_cashonhand=$total_deposit-$total_deposit;
    $ending_bal=$endbal;
$pdf->Cell(18,5,$end_date,1,0,'L', false, '', 1, false, 'L', 'true');
    $pdf->Cell(50,5,'BALANCE ENDING',1,0,'L', false, '', 1, false, 'L', 'true'); 
    $pdf->Cell(30,5,'',1,0,'L', false, '', 1, false, 'L', 'true');       
    $pdf->Cell(21,5,'',1,0,'C', false, '', 1, false, 'C', 'true');
    $pdf->Cell(21,5, '',1,0,'C');
    $pdf->Cell(18,5,$last_cashonhand,1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,$ending_bal,1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
    $pdf->Cell(20,5,'',1,0,'C');
   $pdf->Cell(20,5,$last_cash,1,0,'C');
    $pdf->Cell(21,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Cell(18,5,'',1,0,'C');
    $pdf->Ln();
       
function updateEndBal($bankId, $endingBalance) {
    $bank = Bank::find($bankId);
    $bank->end_bal = $endingBalance;
    $bank->save();
}
function updateWithdrawEndingBalance($last_cash) {
    Transaction::where('type', 'withdraw')->update(['ending_balance' => $last_cash]);
 
} // get the last cash balance
    updateWithdrawEndingBalance($last_cash);

    $pdf->SetFont('Arial', '', 9);

        $pdf->MultiCell(335,5,'  
                                                                                                                                                     CERTIFICATION:

                                                                                                                                                                        I hereby certify that the foregoing is a correct and complete record of all my collections,
                                                                                                                                                                        deposits/remittances and balances of my accounts in the Cash - In Local Treasury, Cash in Bank,
                                                                                                                                                                        Cash Advances, and Petty Cash as of '. $date_string. 


                                                                                                                                                                       
                                                                                                                                                                       
                                                                                                                                                                        ' 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ____________________                        ________________
                                                                                                                                                                          Name and Signature                                      Date',1,'L');


        $pdf->Output();
        exit;



}
}


