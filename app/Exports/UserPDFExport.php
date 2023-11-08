<?php

namespace App\Exports;

use App\Users;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;

class UserPDFExport
{
    public function export()
    {
        $users = DB::table('users')->where('type', '!=' , 'admin')->where('name', '!=' , 'Guest')->select('name', 'email', 'email_verified_at', 'type','trusted')->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->loadHtml(view('pdf.users', ['users' => $users])->render());
        $dompdf->render();

        return $dompdf->stream('users.pdf');
    }
}
