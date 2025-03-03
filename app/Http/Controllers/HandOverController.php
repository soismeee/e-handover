<?php

namespace App\Http\Controllers;

use App\Models\HandOver;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HandOverController extends Controller
{
    public function index(){
        return view('handover.index', [
            'title' => 'Hand Over',
            'menu' => 'Hand Over',
            'submenu' => 'Daftar Hand Over',
        ]);
    }
    
    public function create(){
        return view('handover.create', [
            'title' => 'Create Hand Over',
            'menu' => 'Hand Over',
            'submenu' => 'Form Hand Over',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'no_rm' => 'required|string|max:50',
            'nama_pasien' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'ruang' => 'required|string|max:100',
            'dpjp' => 'required|string|max:100',
            'diagnosa_masuk' => 'nullable|string',
            'keluhan_saat_ini' => 'nullable|string',
            'riwayat_penyakit_dahulu' => 'nullable|string',
            'therapi_dari_dpjp' => 'nullable|string',
            'alergi' => 'nullable|string',
            'kesadaran' => 'nullable|string|max:50',
            'td' => 'nullable|string|max:20',
            'nadi' => 'nullable|string|max:20',
            'nafas' => 'nullable|string|max:20',
            'suhu' => 'nullable|string|max:20',
            'gcs' => 'nullable|string|max:20',
            'pemeriksaan_fisik' => 'nullable|string',
            'hasil_lab_abnormal' => 'nullable|string',
            'iv_line_fluids' => 'nullable|string',
            'pemeriksaan_penunjang' => 'nullable|string',
            'tindakan_keperawatan' => 'nullable|string',
            'intruksi_dokter' => 'nullable|string',
            'pemberi_operan' => 'nullable|string|max:100',
            'penerima_operan' => 'nullable|string|max:100',
        ]);

        // Simpan data ke dalam database
        $handoverForm = HandOver::create($validatedData);

        return response()->json(['statusCode' => 200, 'message' => 'Data berhasil di simpan']);
    }

    public function edit($id){
        return view('handover.edit', [
            'title' => 'Edit Hand Over',
            'menu' => 'Hand Over',
            'submenu' => 'Form Hand Over',
            'handover' => HandOver::find($id),
        ]);
    }

    public function update(Request $request, $id){
        // Validasi data input
        $validatedData = $request->validate([
            'no_rm' => 'required|string|max:50',
            'nama_pasien' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'ruang' => 'required|string|max:100',
            'dpjp' => 'required|string|max:100',
            'diagnosa_masuk' => 'nullable|string',
            'keluhan_saat_ini' => 'nullable|string',
            'riwayat_penyakit_dahulu' => 'nullable|string',
            'therapi_dari_dpjp' => 'nullable|string',
            'alergi' => 'nullable',
            'kesadaran' => 'nullable|string|max:50',
            'td' => 'nullable|string|max:20',
            'nadi' => 'nullable|string|max:20',
            'nafas' => 'nullable|string|max:20',
            'suhu' => 'nullable|string|max:20',
            'gcs' => 'nullable|string|max:20',
            'pemeriksaan_fisik' => 'nullable|string',
            'hasil_lab_abnormal' => 'nullable|string',
            'iv_line_fluids' => 'nullable|string',
            'pemeriksaan_penunjang' => 'nullable|string',
            'tindakan_keperawatan' => 'nullable|string',
            'intruksi_dokter' => 'nullable|string',
            'pemberi_operan' => 'nullable|string|max:100',
            'penerima_operan' => 'nullable|string|max:100',
        ]);

        $handover = HandOver::find($id);
        $handover->update($validatedData);

        return response()->json(['statusCode' => 200, 'message' => 'Data berhasil diubah']);
    }

    public function json()
    {
        // $bulan = Carbon::parse(request('bulan'))->format('m'); // Format bulan (01, 02, ..., 12)
        // $tahun = Carbon::parse(request('bulan'))->format('Y'); // Format tahun (2024, 2025, ...)
        $tanggal = Carbon::parse(request('tanggal'))->format('Y-m-d');
        $columns = ['id', 'no_rm', 'nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'tanggal_masuk', 'ruang', 'dpjp', 'diagnosa_masuk', 'keluhan_saat_ini', 'riwayat_penyakit_dahulu', 'therapi_dari_dpjp', 'alergi', 'kesadaran', 'td', 'nadi', 'nafas', 'suhu', 'gcs', 'pemeriksaan_fisik', 'hasil_lab_abnormal', 'iv_line_fluids', 'pemeriksaan_penunjang', 'tindakan_keperawatan', 'intruksi_dokter', 'pemberi_operan', 'penerima_operan'];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = HandOver::select('id', 'no_rm', 'nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'tanggal_masuk', 'ruang', 'dpjp', 'diagnosa_masuk', 'keluhan_saat_ini', 'riwayat_penyakit_dahulu', 'therapi_dari_dpjp', 'alergi', 'kesadaran', 'td', 'nadi', 'nafas', 'suhu', 'gcs', 'pemeriksaan_fisik', 'hasil_lab_abnormal', 'iv_line_fluids', 'pemeriksaan_penunjang', 'tindakan_keperawatan', 'intruksi_dokter', 'pemberi_operan', 'penerima_operan')
        // ->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun);
        ->whereDate('created_at', $tanggal);

        if (request()->input("search.value")) {
            $data = $data->where(function ($query) {
                $query->whereRaw('nama_pasien like ? ', ['%' . request()->input("search.value") . '%'])
                    ->orWhereRaw('diagnosa_masuk like ? ', ['%' . request()->input("search.value") . '%'])
                    ->orWhereRaw('no_rm like ? ', ['%' . request()->input("search.value") . '%']);
            });
        }

        $recordsFiltered = $data->get()->count();
        $data = $data->skip(request()->input('start'))->take(request()->input('length'))->orderBy($orderBy, request()->input("order.0.dir"))->get();
        $recordsTotal = $data->count();
        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
    }

    public function getHandOver(){
        $tanggal = request('tanggal');
        $data = HandOver::whereDate('created_at', $tanggal)->orderBy('created_at', 'desc')->get();
        if (count($data) > 0) {
            return response()->json(['statusCode' => 200, 'data' => $data]);
        } else {
            return response()->json(['statusCode' => 400,'message' => 'Data tidak ditemukan'], 400);
        }
    }

    public function destroy($id){
        HandOver::destroy($id);
        return response()->json(['statusCode' => 200,'message' => 'Data berhasil dihapus']);
    }
}
