<?php

namespace App\Http\Controllers;

use App\Exports\FilteredCalendarEventsExport;
use App\Exports\EventsPdfExport;
use App\Exports\UserExcelExport;
use App\Exports\UserPDFExport;
use App\Exports\LogsExcelExport;
use App\Exports\LogsPDFExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function exportEvents()
    {
        return Excel::download(new FilteredCalendarEventsExport, 'events.xlsx');
    }


    public function exportEventsPdf()
    {
        return (new EventsPdfExport)->export();
    }

    public function exportUsers()
    {
        return Excel::download(new UserExcelExport, 'users.xlsx');
    }


    public function exportUsersPdf()
    {
        return (new UserPDFExport)->export();
    }

    public function exportLogs()
    {
        return Excel::download(new LogsExcelExport, 'logs.xlsx');
    }


    public function exportLogsPdf()
    {
        return (new LogsPDFExport)->export();
    }

}
