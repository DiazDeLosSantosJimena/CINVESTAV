<?php
  
namespace App\Exports;
  
use App\Models\Projects;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectsRechazadasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Projects::select("modality", "title")->get();
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