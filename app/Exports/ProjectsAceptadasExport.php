<?php
  
namespace App\Exports;
  
use App\Models\Projects;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectsAceptadasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $projects    =  DB::table('Projects')->select("modality", "title", DB::raw("
        Case 
        WHEN  thematic_area == U then Nivel universitario por área. (Cálculo, Algebra, Geometria Analitica, Algebra Lineal, etc.)
        WHEN  thematic_area == P then Nivel Preuniversitario. (Bachillerato.)
        WHEN  thematic_area == B then Nivel Basico. (Primaria o secundaria.)
        WHEN  thematic_area == STEM then Ciencia, Tecnologia, Ingenieria y Matematicas (STEM) 
        ELSE  Historia de las Matematicas"))->where('status','>=','3')->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Modality", "Title", "Descripcion"];
    }

  
}