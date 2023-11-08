<?php

namespace App\Exports;

use App\Events;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class EventsPdfExport
{
    public function export()
    {
        $events = DB::table('events')->select('title', 'description', 'start', 'end')->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml(view('pdf.events', ['events' => $events])->render());
        $dompdf->render();

        return $dompdf->stream('events.pdf');
    }
}
