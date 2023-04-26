<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use TCPDF;

class PdfController extends Controller
{
    public function index() 
    {
    	// Set the font
$pdf->SetFont('times', '', 12);

// Set the name
$name = 'John Smith';

// Set the date
$date = 'March 30, 2023';

// Get the width of the page
$pageWidth = $pdf->GetPageWidth();

// Set the width of the name cell to half of the page width
$nameWidth = $pageWidth / 2;

// Set the height of the name cell to 10
$nameHeight = 10;

// Set the x position of the name cell to the left margin
$nameX = $pdf->GetX();

// Set the y position of the name cell to the current position
$nameY = $pdf->GetY();

// Draw the name cell
$pdf->Cell($nameWidth, $nameHeight, $name, 0, 0, 'L');

// Set the x position of the date cell to the right margin minus the width of the date cell
$dateX = $pageWidth - $pdf->rMargin - $nameWidth;

// Set the y position of the date cell to the current position
$dateY = $pdf->GetY();

// Draw the date cell
$pdf->Cell($nameWidth, $nameHeight, $date, 0, 0, 'R');

// Move the cursor to the next line
$pdf->Ln($nameHeight);

    }
}