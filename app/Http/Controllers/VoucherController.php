<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\Ticket;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class VoucherController extends Controller
{

    public function downloadPDF($id)
    {

        $pdf = Voucher::findOrFail($id);

        $path = storage_path('app\public\\' . $pdf->uri);

        $filename = $pdf->pdf_name;

        $mimeType = Storage::mimeType($path);

        return response()->download($path, $filename, ['Content-Type' => $mimeType]);
    }

    public function generatePDF($code)
    {
        try {
            $ticket = Ticket::where('code', $code)->first();
            $voucher = Voucher::where('ticket_id', $ticket->id)->first();

            if ($voucher) {
                return view('detail.detail', [
                    'tickets' => $ticket,
                    'vouchers' => $voucher,
                ]);
            }
        } catch (\Exception $e) {
            return view('error/error');
        }


        $domPDF = new Dompdf();

        $data = [
            'ticket' => $ticket,
            'date' => date('d-m-Y'),
        ];

        $view_html = view('voucher.pdf', $data)->render();

        $domPDF->loadHtml($view_html);

        $domPDF->setPaper('A4', 'portrait');

        $domPDF->render();


        $filename = 'user_' . Str::random(10) . '.pdf';

        $path = 'pdfs\\' . $filename;
        Storage::disk('public')->put($path, $domPDF->output());

        $voucher = Voucher::create([
            'uri' => $path,
            'ticket_id' => $ticket->id,
            'purchased_date' => date('Y-m-d'),
        ]);

        return view('detail.detail', [
            'tickets' => $ticket,
            'vouchers' => $voucher,
        ]);
    }
}
