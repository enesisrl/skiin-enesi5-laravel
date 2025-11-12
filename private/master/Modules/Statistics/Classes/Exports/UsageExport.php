<?php

namespace Master\Modules\Statistics\Classes\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class UsageExport
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
            __('admin::label.code'),
            __('admin::label.description'),
            __('admin::label.category'),
            __('admin::label.measure'),
            __('admin::label.brand'),
            __('admin::label.days'),
            __('admin::label.profit')
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            $sheet->getStyle($col . '1')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FFE0E0E0');
            $sheet->getStyle($col . '1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $col++;
        }

        // Aggiungi i dati
        $row = 2;
        if ($this->data) {
            foreach ($this->data as $record) {
                $sheet->setCellValue('A' . $row, $record->article_code);
                $sheet->setCellValue('B' . $row, $record->description);
                $sheet->setCellValue('C' . $row, $record->category);
                $sheet->setCellValue('D' . $row, $record->measure);
                $sheet->setCellValue('E' . $row, $record->brand);
                $sheet->setCellValue('F' . $row, $record->days);
                $sheet->setCellValue('G' . $row, $record->profit);

                // Formatta il profitto come numero con 2 decimali
                $sheet->getStyle('G' . $row)->getNumberFormat()->setFormatCode('#,##0.00');

                // Allineamenti
                $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('D' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

                $row++;
            }
        }

        // Applica bordi a tutta la tabella
        if ($row > 2) {
            $sheet->getStyle('A1:G' . ($row - 1))->getBorders()->getAllBorders()
                ->setBorderStyle(Border::BORDER_THIN);
        }

        // Autosize colonne
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        return $writer;
    }
}

