<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{

    public function downloadPDF($id){

        $pdf = Voucher::findOrFail($id);

        $path = torage_path('app\public\\'.$pdf->uri);

        $filename = $pdf->pdf_name;

        $mimeType = Storage::mimeType($path);

        return response()->download($path, $filename, ['Content-Type' => $mimeType]);
    }

    public function generatePDF($id_ticket)
    {

         $ticket = Ticket::findOrFail($id_ticket);
         $domPDF = new Dompdf();

         $data = [
            'ticket' => $ticket,
            'date'=> date('d-m-Y'),
         ];

         $view_html = view('voucher.pdf', $data)->render();

         $domPDF->loadHtml($view_html);

         $domPDF->setPaper('A4','portrait');

         $domPDF->render();


         $filename = 'user_'.Str::random(10).'.pdf';

         $path = 'pdfs\\'.$filename;
         Storage::disk('public')->put($path,$domPDF->output());

         $voucher = Voucher::create([
            'uri' => $path,
            'ticket_id' => $id_ticket,
            'date' => date('Y-m-d'),
         ]);

         return view('detail.detail',[
            'ticket' => $ticket,
            'voucher' => $voucher,
         ]);
    }
}
