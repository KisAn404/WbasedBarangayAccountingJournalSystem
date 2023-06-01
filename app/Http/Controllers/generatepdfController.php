<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use FPDF;
use App\Models\Transaction;
Use App\Models\AccForm;
use Illuminate\Support\Facades\Date;

class generatepdfController extends Controller
{
   public function index(Request $request)
    {
        // Retrieve the selected dates from the form
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Query the database to retrieve the relevant data
        $data = DB::table('transactions')
            ->whereBetween('date', [$start_date, $end_date])
            ->get();
            
$pdf = new FPDF('L', 'mm', 'Legal');
$pdf->SetMargins(20, 10, 20, 10); // 1 inch = 72 points

$pdf->AddPage();

  
// Set the margins to 0.5 inches


// Enable automatic page breaking
$pdf->SetAutoPageBreak(true);
// Get the current month and year
$month = date('F');
$year = date('Y');

// Calculate the start and end dates of the month
$start_date = date('Y-m-d', strtotime("first day of $month $year"));
$end_date = date('Y-m-d', strtotime("last day of $month $year"));

// Format the date string
$date_string = date('F j, Y', strtotime($start_date)) . ' - ' . date('j, Y', strtotime($end_date));
  $pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(335, 5, 'REPORT OF ACCOUNTABILITY FOR ACCOUNTABLE FORMS', 0, 1, 'C');
  $pdf->SetFont('Arial', 'U', 11);
$pdf->Cell(335, 10, 'For the Month of '. $date_string, 0, 1, 'C');
  $pdf->SetFont('Arial', '', 11);

        // Output the PDF document
        $pdf->Output();
        exit;
    }
}