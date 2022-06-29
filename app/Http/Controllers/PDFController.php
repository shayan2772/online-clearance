<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'name' => auth()->user()->name,
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('theme.student.clearanceCertificate', $data);

        return $pdf->download('clearanceCertificate.pdf');
    }
}
