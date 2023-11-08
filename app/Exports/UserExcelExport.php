<?php

namespace App\Exports;

use App\Models\Users;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = Users::where('type', '!=' , 'admin')->where('name', '!=' , 'Guest')->get(['name', 'email', 'email_verified_at', 'type', 'trusted']);
        foreach($users as $user){
            $user['trusted'] = ($user->trusted == 0 ) ? 'Not yet' : 'Yes' ; 
        }
        return $users;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Email Verified At',
            'Account Type',
            'Account Trusted',
        ];
    }
}
