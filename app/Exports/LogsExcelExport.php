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
        $logs = Activities::join('users', 'activities.users_id', '=', 'users.id')
            ->select('activities.id as log_id', 'users.name as user_name', 'activities.activity', 'activities.created_at')
            ->get();

        return $logs;
    }

    public function headings(): array
    {
        return [
            'Log ID',
            'User Name', // Changed from 'Users ID'
            'Activity',
            'Created at',
        ];
    }
}
