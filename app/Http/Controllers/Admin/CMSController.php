<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config\Registro;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CMSController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function upload()
    {
        $path_url = 'storage/archivos';

        if (request()->hasFile('upload')) {
            $originName = request()->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = request()->file('upload')->getClientOriginalExtension();
            $fileName = Str::slug($fileName) . '_' . time() . '.' . $extension;
            request()->file('upload')->move(public_path($path_url), $fileName);
            $url = asset($path_url . '/' . $fileName);
        }

        return response()->json(['url' => $url]);
    }

    public function exportxls($inicio, $final, $usuario = null, $buscar = null)
    {
        $results = Registro::whereBetween('created_at', [$inicio . ' 00:00:00', $final . ' 23:59:59']);

        if (!empty($buscar)) {
            $results = $results->search($buscar);
        }

        if (!empty($usuario)) {
            $results = $results->where('causer_id', $usuario);
        }

        $results = $results->get();

        return response(view('files.excel')->with(compact('results')), 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="log_report_' . Carbon::now() . '.xls"',
        ]);
    }

    public function setEncryption($dompdf)
    {
        $dompdf->get_canvas()->get_cpdf()->setEncryption('userpass', 'ownerpass', array('print'));
    }
}
