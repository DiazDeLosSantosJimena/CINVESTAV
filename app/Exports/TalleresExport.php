<?php

namespace App\Exports;

use App\Models\Workshops;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Font;

class TalleresExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    
     *@return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $workshops = DB::table('workshopattendances')
        ->join('workshops', 'workshopattendances.workshop_id', '=', 'workshops.id')
        ->join('users', 'workshopattendances.user_id', '=', 'users.id')
        ->select('workshops.nameu as workshop_name', 'workshops.title', DB::raw("CASE 'workshops.activity' WHEN '4' THEN 'Taller' ELSE 'Taller' END AS activity_description"), 'workshops.date', 'workshops.hour', 'workshops.site', 'workshops.assistance', 'users.name', 'users.app', 'users.apm')
        ->where('workshops.activity', 4)
        ->get();
    }

    /**
     *Write code on Method*
     *
     *@return response()*/
    public function headings(): array
    {
        return ["Expositores", "Título", "Actividad", "Fecha", "Hora", "Lugar", "Asistencia", "Nombre del asistente", "Apellido Paterno", "Apellido Materno"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:J1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('0078a1');

                $event->sheet->getColumnDimension('A')->setWidth(34);
                $event->sheet->getColumnDimension('B')->setWidth(73);
                $event->sheet->getColumnDimension('C')->setWidth(8);
                $event->sheet->getColumnDimension('D')->setWidth(10);
                $event->sheet->getColumnDimension('E')->setWidth(8);
                $event->sheet->getColumnDimension('F')->setWidth(10);
                $event->sheet->getColumnDimension('G')->setWidth(16);
                $event->sheet->getColumnDimension('H')->setWidth(8);
                $event->sheet->getColumnDimension('I')->setWidth(8);
                $event->sheet->getColumnDimension('J')->setWidth(10);

                $event->sheet->getStyle('A1:J1')->getFont()->getColor()->setARGB('ffffff');
            },
        ];
    }
}
