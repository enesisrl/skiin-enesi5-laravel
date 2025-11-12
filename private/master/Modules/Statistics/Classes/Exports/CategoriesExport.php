<?php

namespace Master\Modules\Statistics\Classes\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CategoriesExport
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Imposta le intestazioni
        $headers = [
            __('admin::label.category'),
            __('admin::label.duration'),
            __('admin::label.number_of_acceptances'),
            __('admin::label.amount')
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            $sheet->getStyle($col . '1')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FFE0E0E0');
            $sheet->getStyle($col . '1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $col++;
        }

        // Aggiungi i dati
        $row = 2;
        $total_acceptances = 0;
        $total_amount = 0;

        if ($this->data) {
            foreach ($this->data as $record) {
                $sheet->setCellValue('A' . $row, $record->category_description);
                $sheet->setCellValue('B' . $row, $record->duration);
                $sheet->setCellValue('C' . $row, $record->total_acceptances);
                $sheet->setCellValue('D' . $row, $record->amount);

                // Formatta l'importo come numero con 2 decimali
                $sheet->getStyle('D' . $row)->getNumberFormat()->setFormatCode('#,##0.00');

                // Allineamenti
                $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $sheet->getStyle('D' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

                $total_acceptances += $record->total_acceptances;
                $total_amount += $record->amount;

                $row++;
            }
        }

        // Riga totali
        $sheet->setCellValue('A' . $row, __('admin::label.totals'));
        $sheet->setCellValue('C' . $row, $total_acceptances);
        $sheet->setCellValue('D' . $row, $total_amount);

        $sheet->getStyle('A' . $row)->getFont()->setBold(true);
        $sheet->getStyle('C' . $row)->getFont()->setBold(true);
        $sheet->getStyle('D' . $row)->getFont()->setBold(true);
        $sheet->getStyle('D' . $row)->getNumberFormat()->setFormatCode('#,##0.00');
        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('D' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        // Applica bordi a tutta la tabella
        if ($row > 1) {
            $sheet->getStyle('A1:D' . $row)->getBorders()->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN);
        }

        // Autosize colonne
        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        return $writer;
    }
}

