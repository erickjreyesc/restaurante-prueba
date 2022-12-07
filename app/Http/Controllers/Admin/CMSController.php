<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuracion\Registro;
use App\Models\PQRSD\Solicitud;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
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

    public function PdfDetailsSolicitud(Solicitud $solicitud, $textform = "activas")
    {
        try {
            $fileName = 'detalles_' . $solicitud->codigo . '_' . $textform . '_' . Carbon::now()->format('Ymd') . '.pdf';

            $html = view('livewire.admin.reportes.detalles', [
                'solicitud' => $solicitud,
                'impreso' => Carbon::now()->format('Y-m-d'),
                'estado' => (intval($solicitud->cerrado) == 1) ? 'Cerrado' : 'Vigente',
            ]);
            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $options->set('chroot', realpath(base_path()));
            $options->set('enable_font_subsetting', false);
            $options->set('pdf_backend', 'CPDF');
            $options->set('default_media_type', 'screen');
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->render();
            //$this->setEncryption($dompdf);
            $dompdf->stream($fileName, array('Attachment' => 1));
        } catch (\Throwable $th) {
            session()->flash('error', _('backend.errors.base', [
                'code' => $th->getCode(),
                'message' => $th->getMessage()
            ]));
        }
    }

    public function setEncryption($dompdf)
    {
        $dompdf->get_canvas()->get_cpdf()->setEncryption('userpass', 'ownerpass', array('print'));
    }
}
