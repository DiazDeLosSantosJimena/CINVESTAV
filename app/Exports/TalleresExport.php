<?php
  
namespace App\Exports;
  
use App\Models\Workshops;
use Maatwebsite\Excel\Concerns\FromCollection;

class TalleresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Workshops::select("nameu", "title")->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Nameu", "Title"];
    }

  
}