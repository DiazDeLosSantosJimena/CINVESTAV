<?php

namespace App\Exports;

use App\Models\Workshops;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Font;

class cantponentesExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    
     *@return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $workshops = DB::table('Workshops')
        ->select(DB::raw('COUNT(id)')) 
        ->get();
    }

    /**
     *Write code on Method*
     *
     *@return response()
     */
    public function headings(): array
    {
        return ["Cantidad de ponentes Registrados"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('0078a1');

                $event->sheet->getColumnDimension('A')->setWidth(31);
              
              

                $event->sheet->getStyle('A1:B1')->getFont()->getColor()->setARGB('ffffff');
            },
        ];
    }
}
