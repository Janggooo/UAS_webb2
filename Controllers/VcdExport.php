<?php
namespace App\Controllers;

//memanggil model
use App\Models\VcdModel;
use App\Models\GenreModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//memanggil package pdf
use Dompdf\Dompdf;

class VcdExport extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->VcdModel = new VcdModel();
        $this->GenreModel = new GenreModel();
    }

    function export_xls()
    {
        //select data from table buku
        $list = $this->VcdModel->select('vcd.id, vcd.judul, genre.nama AS genre_nama')->join('genre','vcd.genre_id = genre.id')->orderBy('genre.nama, judul')->findAll();

        //filename
        $fileName = 'vcd_export.xlsx';

        //start package excel
        $spreadsheet = new Spreadsheet();

        //header
        $sheet = $spreadsheet->getActiveSheet();
        //(A1 : lokasi line & column excel, No : display data)
        $sheet->setCellValue('A1', 'No')->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B1', 'Genre')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C1', 'Judul')->getColumnDimension('C')->setAutoSize(true);

        //body
        $line = 2;
        foreach ($list as $row) {
            $sheet->setCellValue('A'.$line, $line-1);
            $sheet->setCellValue('B'.$line, $row['genre_nama']);
            $sheet->setCellValue('C'.$line, $row['judul']);
            $line++;
        }

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    function export_pdf()
    {
        //select data from table buku
        $list = $this->VcdModel->select('vcd.id, vcd.judul, genre.nama AS genre_nama')->join('genre','vcd.genre_id = genre.id')->orderBy('genre.nama, judul')->findAll();

        //filename
        $fileName = 'vcd_export';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('vcd_export_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($fileName);
    }
}