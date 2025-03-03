@extends('layout.app')
@push('css')
    <!-- Sweet Alert-->
    <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('container')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Formulir Serah Terima Pasien</h4>
                <p class="card-title-desc">Anda dapat mengisi formulir serah terima pasien dengan mengisi form yang ada dibawah ini, data yang telah di inputkan bisa dilihat pada menu Daftar Hand Over.</p>
            </div>
            <div class="card-body">
                <div class="container">
                    <form id="form-handover">
                        <!-- CSRF Token -->
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="no_rm" class="form-label">No RM</label>
                                <input type="text" class="form-control" id="no_rm" name="no_rm" required>
                            </div>
                    
                            <div class="col-md-4">
                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                            </div>
                    
                            <div class="col-md-4">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                    
                            <div class="col-md-4">
                                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ date('Y-m-d') }}" required>
                            </div>
                    
                            <div class="col-md-4">
                                <label for="ruang" class="form-label">Ruang</label>
                                <input type="text" class="form-control" id="ruang" name="ruang" required>
                            </div>
                        </div>
                
                        <div class="mb-3">
                            <label for="dpjp" class="form-label">DPJP</label>
                            <input type="text" class="form-control" id="dpjp" name="dpjp" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="diagnosa_masuk" class="form-label">Diagnosa Masuk</label>
                            <textarea class="form-control" id="diagnosa_masuk" name="diagnosa_masuk" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="keluhan_saat_ini" class="form-label">Keluhan Saat Ini</label>
                            <textarea class="form-control" id="keluhan_saat_ini" name="keluhan_saat_ini" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="riwayat_penyakit_dahulu" class="form-label">Riwayat Penyakit Dahulu</label>
                            <textarea class="form-control" id="riwayat_penyakit_dahulu" name="riwayat_penyakit_dahulu" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="therapi_dari_dpjp" class="form-label">Therapi dari DPJP</label>
                            <textarea class="form-control" id="therapi_dari_dpjp" name="therapi_dari_dpjp" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="alergi" class="form-label">Alergi</label>
                            <textarea class="form-control" id="alergi" name="alergi" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="kesadaran" class="form-label">Kesadaran</label>
                            <input type="text" class="form-control" id="kesadaran" name="kesadaran">
                        </div>
                
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label for="td" class="form-label">TD</label>
                                <input type="text" class="form-control" id="td" name="td">
                            </div>
                            <div class="col-md-3">
                                <label for="nadi" class="form-label">Nadi</label>
                                <input type="text" class="form-control" id="nadi" name="nadi">
                            </div>
                            <div class="col-md-3">
                                <label for="nafas" class="form-label">Nafas</label>
                                <input type="text" class="form-control" id="nafas" name="nafas">
                            </div>
                            <div class="col-md-3">
                                <label for="suhu" class="form-label">Suhu</label>
                                <input type="text" class="form-control" id="suhu" name="suhu">
                            </div>
                        </div>
                
                        <div class="mb-3">
                            <label for="gcs" class="form-label">GCS</label>
                            <input type="text" class="form-control" id="gcs" name="gcs">
                        </div>
                
                        <div class="mb-3">
                            <label for="pemeriksaan_fisik" class="form-label">Pemeriksaan Fisik</label>
                            <textarea class="form-control" id="pemeriksaan_fisik" name="pemeriksaan_fisik" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="hasil_lab_abnormal" class="form-label">Hasil Lab (Abnormal)</label>
                            <textarea class="form-control" id="hasil_lab_abnormal" name="hasil_lab_abnormal" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="iv_line_fluids" class="form-label">IV Line/Fluids</label>
                            <textarea class="form-control" id="iv_line_fluids" name="iv_line_fluids" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="pemeriksaan_penunjang" class="form-label">Pemeriksaan Penunjang</label>
                            <textarea class="form-control" id="pemeriksaan_penunjang" name="pemeriksaan_penunjang" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="tindakan_keperawatan" class="form-label">Tindakan Keperawatan</label>
                            <textarea class="form-control" id="tindakan_keperawatan" name="tindakan_keperawatan" rows="3"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="intruksi_dokter" class="form-label">Instruksi Dokter</label>
                            <textarea class="form-control" id="intruksi_dokter" name="intruksi_dokter" rows="3"></textarea>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="pemberi_operan" class="form-label">Pemberi Operan</label>
                                <input type="text" class="form-control" id="pemberi_operan" name="pemberi_operan">
                            </div>
                    
                            <div class="col-md-6">
                                <label for="penerima_operan" class="form-label">Penerima Operan</label>
                                <input type="text" class="form-control" id="penerima_operan" name="penerima_operan">
                            </div>
                        </div>
                
                        <button type="submit" class="btn btn-primary" id="tombol">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->   
</div>
@endsection

@push('js')
    <!-- Sweet Alerts js -->
    <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script>

        $('#form-handover').on('submit', function(event){
            event.preventDefault();
            $('#tombol').html('Loading...');
            $.ajax({
                type: "POST",
                url: "{{ url('/save') }}",
                data: $('#form-handover').serialize(),
                success: function(response){
                    $('#tombol').html("Simpan");
                    $('#form-handover')[0].reset();
                    alert(response.message);
                    window.location.href = "/hand-over"
                },
                error: function(err){
                    $('#tombol').html("Simpan");
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: err.responseJSON.message,
                    });
                }
            });
        });
    </script>
@endpush