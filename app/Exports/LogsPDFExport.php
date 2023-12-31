<?php

namespace App\Exports;

use App\Models\Activities;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class LogsPDFExport
{
    public function export()
    {
        $logs = Activities::join('users', 'activities.users_id', '=', 'users.id')
            ->select('activities.id as log_id', 'users.name as user_name', 'activities.activity', 'activities.created_at')
            ->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml(view('pdf.logs', ['logs' => $logs])->render());
        $dompdf->render();

        return $dompdf->stream('logs.pdf');
    }
}
