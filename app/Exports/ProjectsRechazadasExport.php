<?php

namespace App\Exports;

use App\Models\Projects;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Font;

class ProjectsRechazadasExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     *@return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $projects = DB::table('Projects')
            ->select(DB::raw("CASE modality WHEN 'P' THEN 'Ponencia' ELSE 'Cartel' END AS modality_description"), "title", DB::raw("
            CASE thematic_area
                WHEN 'U' THEN 'Nivel universitario por área (Cálculo, Álgebra, Geometría Analítica, Álgebra Lineal, etc.)'
                WHEN 'P' THEN 'Nivel Preuniversitario (Bachillerato)'
                WHEN 'B' THEN 'Nivel Básico (Primaria o secundaria)'
                WHEN 'STEM' THEN 'Ciencia, Tecnología, Ingeniería y Matemáticas (STEM)'
                ELSE 'Historia de las Matemáticas'
            END AS thematic_description
        "))
            ->where('status', '<=', 0)
            ->get();
    }

    /**
     *Write code on Method*
     *
     *@return response()
     */
    public function headings(): array
    {
        return ["Modalidad", "Título", "Eje temático"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:C1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('0078a1');

                $event->sheet->getColumnDimension('A')->setWidth(10);
                $event->sheet->getColumnDimension('B')->setWidth(60);
                $event->sheet->getColumnDimension('C')->setWidth(35);

                $event->sheet->getStyle('A1:C1')->getFont()->getColor()->setARGB('ffffff');
            },
        ];
    }
}
