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
        $logs = Activities::with('users')->get(['activity', 'created_at']);
        return $logs;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Activity',
            'Created at',
        ];
    }
}
