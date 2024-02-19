<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;
Carbon::setLocale('id');

class templatePengajuanController extends Controller
{
    public function index(string $id)
    {
        $pegawai = User::find($id);
        $name= $pegawai->nama;
        $nik = $pegawai->nik;
        $jabatan = $pegawai->jabatan;
        $cuti = [
            '2024-02-01',
            '2024-02-02'
        ];
        $hari = count($cuti);
        $year1 = Carbon::parse($pegawai->kontrak->where('aktif',1)->value('tanggal_mulai'))->translatedFormat('Y');
        $year2 = Carbon::parse($pegawai->kontrak->where('aktif',1)->value('tanggal_selesai'))->translatedFormat('Y');
        $tanggal_masuk = Carbon::parse($pegawai->tanggal_masuk)->translatedFormat('j F Y') ;
        $template = new TemplateProcessor(storage_path('app/template.docx'));
        $template->setValue('name', $name);
        $template->setValue('nik', $nik);
        $template->setValue('jabatan', $jabatan);
        $template->setValue('tanggal_cuti', implode(",", $cuti));
        $template->setValue('tanggal_sekarang', now()->translatedFormat('j F Y'));
        $template->setValue('tanggal', now()->translatedFormat('j-m-y'));
        $template->setValue('jmlh_hari', $hari);
        $template->setValue('year1', $year1);
        $template->setValue('year2', $year2);
        $template->setValue('tanggal_masuk', $tanggal_masuk);


        $filename = 'surat_cuti.docx';
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=$filename");
        $template->saveAs('php://output');
    }
}
