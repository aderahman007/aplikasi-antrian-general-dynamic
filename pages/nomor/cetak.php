<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../config/env.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

function getFont($font){
    switch ($font) {
        case 'FONT_A':
            return Printer::FONT_A;
            break;
        case 'FONT_B':
            return Printer::FONT_B;
        case 'FONT_C':
            return Printer::FONT_C;
            break;
        default:
            return Printer::FONT_A;
            break;
    }
}

function cetak($no_antrian, $code_antrian, $data)
{
    $hariIni = new DateTime();

    $setting_printer = (!empty($data['printer'])) ? json_decode($data['printer'], true) : [];

    try {
        // Enter the share name for your USB printer here
        // $connector = "MacBook-Pro.local";
        $connector = new WindowsPrintConnector("smb://" . $setting_printer['ip_komputer_printer'] . "/" . $setting_printer['nama_sharing_printer']);

        /* Print a "Hello world" receipt" */
        $printer = new Printer($connector);
        $printer->initialize();

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setEmphasis(true);
        $printer->setFont(getFont($setting_printer['tipe_font_header']));
        $printer->setTextSize((int)$setting_printer['lebar_font_header'], (int)$setting_printer['tinggi_font_header']);
        $printer->text(str_replace('newLine', '\n', $setting_printer['header_struk']));
        $printer->selectPrintMode(); // Reset\
        $printer->setFont(getFont($setting_printer['tipe_font_alamat']));
        $printer->setTextSize((int)$setting_printer['lebar_font_alamat'], (int)$setting_printer['tinggi_font_alamat']);
        $printer->text(str_replace('newLine', '\n', $setting_printer['alamat_struk']));
        $printer->text("==================================================\n\n");
        $printer->selectPrintMode(); // Reset

        $printer->setFont(getFont($setting_printer['tipe_font_no_antrian']));
        $printer->setTextSize(2, 1);
        $printer->text("NOMOR ANTRIAN ANDA\n\n");
        $printer->selectPrintMode(); // Reset
        $printer->setFont(getFont($setting_printer['tipe_font_no_antrian']));
        $printer->setTextSize((int)$setting_printer['lebar_font_no_antrian'], (int)$setting_printer['tinggi_font_no_antrian']);
        $printer->text($code_antrian . $no_antrian . "\n\n\n");
        $printer->selectPrintMode(); // Reset

        $printer->setFont(getFont($setting_printer['tipe_font_informasi']));
        $printer->setTextSize((int)$setting_printer['lebar_font_informasi'], (int)$setting_printer['tinggi_font_informasi']);
        $printer->text(str_replace('newLine', '\n', $setting_printer['informasi_struk']));
        $printer->text(hariIndo(date('l')) . " " . strftime('%d %B %Y', $hariIni->getTimestamp()) . "\n\n");

        $printer->selectPrintMode(); // Reset
        $printer->setFont(getFont($setting_printer['tipe_font_footer']));
        $printer->setTextSize((int)$setting_printer['lebar_font_footer'], (int)$setting_printer['tinggi_font_footer']);
        $printer->text(str_replace('newLine', '\n', $setting_printer['footer_struk']) . "\n\n\n\n\n");
        $printer->selectPrintMode(); // Reset

        $printer->cut(Printer::CUT_PARTIAL, 2);

        /* Close printer */
        $printer->close();
    } catch (Exception $e) {
        echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
    }
}


function hariIndo($hariInggris)
{
    switch ($hariInggris) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
    }
}
