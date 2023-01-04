<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    //
    public function index()
    {
        $data["email"] = "manish.tale@sapphiresolutions.net";
        $data["title"] = "Demo Email PDF";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView('emails.myTestMail', $data);

        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });

        dd('Mail sent successfully');
    }
}
