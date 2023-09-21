<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Font;

class CartelesPonenciasExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    
     *@return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $projects = DB::table('Projects')
        ->select(DB::raw('COUNT(CASE WHEN modality = "P" THEN 1 ELSE NULL END) as count_P'),
        DB::raw('COUNT(CASE WHEN modality = "C" THEN 1 ELSE NULL END) as count_C'))
        ->get();
    }

    /**
     *Write code on Method*
     *
     *@return response()
     */
    public function headings(): array
    {
        return ["Ponencias", "Carteles"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:B1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('0078a1');

                $event->sheet->getColumnDimension('A')->setWidth(31);
                $event->sheet->getColumnDimension('B')->setWidth(31);

              
              

                $event->sheet->getStyle('A1:B1')->getFont()->getColor()->setARGB('ffffff');
            },
        ];
    }
}
