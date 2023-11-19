<?php

namespace App\Exports;

use App\Models\Activities;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class LogsExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $logs = Activities::with('users')->get();
        return $logs;
    }

    public function headings(): array
    {
        return [
            'Log ID',
            'Users ID',
            'Activity',
            'Created at',
        ];
    }
}
