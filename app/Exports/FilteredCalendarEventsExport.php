<?php

namespace App\Exports;

use App\Models\Events;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class FilteredCalendarEventsExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Events::all(['title', 'description', 'start', 'end']);
    }

    public function headings(): array
    {
        return [
            'Title',
            'Description',
            'Start Date',
            'End Date',
        ];
    }
}

