<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class StaffExport implements FromCollection, WithHeadings, WithMapping, WithEvents
{
  protected $rowNumber = 0;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): \Illuminate\Support\Collection
    {
        return DB::table('staff')->select('name','jabatan','tanggal','jenis_kelamin','alamat')
          ->join('users', 'staff.user_id', '=', 'users.id')
          ->groupBy('staff.id')
          ->get();
    }

  public function headings():array
  {
    return ['No','Nama Staff','Jabatan','Tanggal','Jenis Kelamin','Alamat'];
    }

  public function map($staff): array
  {
    return [
      'No' => ++$this->rowNumber,
      'Nama Staff' => $staff->name,
      'Jabatan' => $staff->jabatan,
      'Tanggal' => $staff->tanggal,
      'Jenis Kelamin' => $staff->jenis_kelamin,
      'Alamat' => $staff->alamat
    ];
  }
  public function registerEvents(): array
  {
    return [
      AfterSheet::class => function (AfterSheet $event) {
        $event->sheet->getStyle('A1:F1')->applyFromArray([
          'font' => [
            'bold' => true,
          ],
          'borders' => [
            'allBorders' => [
              'borderStyle' => Border::BORDER_THIN,
            ],
          ],
        ]);
        $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
        $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
        $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
        $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
        $event->sheet->getDelegate()->getColumnDimension('E')->setAutoSize(true);
        $event->sheet->getDelegate()->getColumnDimension('F')->setAutoSize(true);
        $this->rowNumber = 0;
      },
    ];
  }
}
