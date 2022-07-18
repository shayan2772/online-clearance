<?php

namespace App\Http\Controllers;

use App\Mail\DownloadedClrearanceCertificate;
use App\Mail\FormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

        Mail::to('admin@admin.com')->send(new DownloadedClrearanceCertificate('Admin'));

        return $pdf->download('clearanceCertificate.pdf');
    }
}
