@extends('layout.app')
@push('css')
        <!-- DataTables -->
        <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
        <!-- Responsive datatable examples -->
        <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
        
        <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    
@endpush
@section('container')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <h4 class="card-title">{{ $title }}</h4>
                        <span>Data serah terima pasien, anda bisa mencari data berdasarkan tanggal</span>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="data-hand-over">
                    <table id="data-handover" class="table table-striped mb-0">

                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th class="text-center" width="10%">Data Pasien</th>
                                <th class="text-center" width="10%">Ruang</th>
                                <th class="text-center" width="10%">Situation (S)</th>
                                <th class="text-center" width="10%">Background (B)</th>
                                <th class="text-center" width="20%">Assesment (A)</th>
                                <th class="text-center" width="20%">Recomendation (R)</th>
                                <th class="text-center" width="10%">Operan</th>
                                <th class="text-center" width="5%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
    <!-- Required datatable js -->
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script>
        // const table = $('#data-handover').DataTable({          
        //     "lengthMenu": [[5, 10, 25, 50, 100, -1],[5, 10, 25, 50, 100, 'All']],
        //     "pageLength": 10, 
        //     processing: true,
        //     serverSide: true,
        //     responseive: true,
        //     ajax: {
        //         url:"{{ url('jsonHandOver') }}",
        //         type:"POST",
        //         data:function(d){
        //             d._token = "{{ csrf_token() }}",
        //             d.tanggal = $("#tanggal").val()
        //         }
        //     },
        //     columns:[
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 return meta.row + meta.settings._iDisplayStart + 1;
        //             }
        //         },
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 let tanggal_masuk = new Date(row.tanggal_masuk).toLocaleDateString('id-ID', {
        //                     day: '2-digit',
        //                     month: 'short',
        //                     year: 'numeric',
        //                 });

        //                 let tgl_lahir = new Date(row.tanggal_lahir).toLocaleDateString('id-ID', {
        //                     day: '2-digit',
        //                     month: 'short',
        //                     year: 'numeric',
        //                 });

        //                 let jekel = row.jenis_kelamin == "L" ? "Laki-laki" : "Perempuan";
        //                 return row.nama_pasien + " (" + row.no_rm + ") <br />" +
        //                 jekel + " (" + tgl_lahir +")<br />" + tanggal_masuk + "<br />" + row.dpjp
        //             }
        //         },
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 return row.ruang
        //             }
        //         },
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 return "Diagnosa : " + row.diagnosa_masuk + "<br /> Keluhan : " + row.keluhan_saat_ini
        //             }
        //         },
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 return "Riwayat : " + row.riwayat_penyakit_dahulu + "<br /> Therapi : " + row.therapi_dari_dpjp + "<br /> Therapi : " + row.alergi
        //             }
        //         },
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 return "Kesadaran <br />" + row.riwayat_penyakit_dahulu + "; TD : " + row.td + "; Nadi : " + row.nadi + "; Nafas : " + row.nafas + "; Suhu : " + row.suhu
        //                 + "<br /> P. Fisik : " + row.pemeriksaan_fisik
        //                 + "<br /> Hasil Lab : " + row.hasil_lab_abnormal
        //                 + "<br /> Live Fluids : " + row.iv_line_fluids
        //                 + "<br /> P. Penunjang : " + row.pemeriksaan_penunjang
        //             }
        //         },
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 return "Tindakan : " + row.tindakan_keperawatan + "<br />Intruksi : " + row.intruksi_dokter 
        //             }
        //         },
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 return "Pemberi : " + row.pemberi_operan + "<br />Penerima : " + row.penerima_operan 
        //             }
        //         },
        //         {
        //             "targets": "_all",
        //             "defaultContent": "-",
        //             "render": function(data, type, row, meta){
        //                 return `
        //                     <a href="/hand-over/`+row.id+`" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
        //                     <br />    
        //                     <a href="" class="btn btn-sm btn-danger hapus" data-id="`+row.id+`"><i class="bx bx-trash"></i></a>
        //                 ` 
        //             }
        //         },

                
        //     ]
        // });

        $(document).ready(function(){
            loading();
            loaddata();
        });

        function loading(){
            $('#data-hand-over table tbody').append(
                `
                <tr>
                    <td colspan="9" class="text-center" id="loading">Loading...</td>    
                </tr>
                `
            )
        }

        $(document).on('change', '#tanggal', function(e){
            // $('#data-hand-over table tbody').empty();
            // loading();
            loaddata();
        });

        function formatTanggal(tanggal) {
            if (!tanggal) return "Belum tersedia"; // Jika tanggal null atau undefined
            let date = new Date(tanggal); // Konversi string tanggal ke objek Date
            let day = String(date.getDate()).padStart(2, '0'); // Hari dengan 2 digit
            let month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dengan 2 digit
            let year = date.getFullYear(); // Tahun
            return `${day}/${month}/${year}`; // Format dd-mm-yyyy
        }

        function formatTime(dateString) {
            // Ubah string menjadi objek Date
            let date = new Date(dateString);

            // Ambil jam, menit, dan detik
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let seconds = date.getSeconds();

            // Tambahkan angka nol di depan angka jika kurang dari 10
            hours = hours < 10 ? '0' + hours : hours;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            // Format waktu dalam format HH:mm:ss
            return `${hours}:${minutes}:${seconds}`;
        }

        function loaddata(){
            $.ajax({
                url: "{{ url('getHandOver') }}",
                type: "GET",
                data: {_token: "{{ csrf_token() }}", 'tanggal' : $('#tanggal').val()},
                success: function(response){
                    $('#loading').hide();
                    let data = response.data;
                    data.forEach((params, index) => {

                        let tanggal_masuk = new Date(params.tanggal_masuk).toLocaleDateString('id-ID', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric',
                        });

                        let tgl_lahir = new Date(params.tanggal_lahir).toLocaleDateString('id-ID', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric',
                        });

                        let jekel = params.jenis_kelamin == "L" ? "Laki-laki" : "Perempuan";
                        // ###################################################################################

                        $('#data-hand-over table tbody').append(
                            `
                            <tr>
                                <td>${index+1}</td>    
                                <td>
                                    ${params.nama_pasien}  ( ${params.no_rm} ) <br />
                                    ${jekel} (${tgl_lahir})    
                                </td>   
                                <td>${params.ruang} <br /> ${tanggal_masuk} <br /> ${params.dpjp}</td>   
                                <td>Diagnosa : ${params.diagnosa_masuk} <br /> Keluhan :  ${params.keluhan_saat_ini}</td>   
                                <td>Riwayat : ${params.riwayat_penyakit_dahulu} <br /> Therapi : ${params.therapi_dari_dpjp} <br /> Therapi : ${params.alergi} </td>
                                <td>
                                    Kesadaran <br /> ${params.riwayat_penyakit_dahulu}; TD :  ${params.td}; Nadi :  ${params.nadi}; Nafas :  ${params.nafas}; Suhu :  ${params.suhu}
                                    <br /> P. Fisik :  ${params.pemeriksaan_fisik}
                                    <br /> Hasil Lab :  ${params.hasil_lab_abnormal}
                                    <br /> Live Fluids :  ${params.iv_line_fluids}
                                    <br /> P. Penunjang :  ${params.pemeriksaan_penunjang}    
                                </td>   
                                <td>Tindakan : ${params.tindakan_keperawatan} <br />Intruksi : ${params.intruksi_dokter}</td>   
                                <td>Pemberi :  ${params.pemberi_operan} <br />Penerima : ${params.penerima_operan}</td>   
                                <td>
                                    <a href="/hand-over/${params.id}" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                    <br />    
                                    <a href="" class="btn btn-sm btn-danger hapus" data-id="${params.id}"><i class="bx bx-trash"></i></a>
                                </td>
                            </tr>
                            `
                        )
                    });
                },
                error: function(err){
                    // $('#loading').show();
                    // $('#loading').text(err.responseJSON.message);
                }
            });
        }

        $(document).on('click', '.hapus', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            Swal.fire({
                title: "Yakin ingin menghapus ini?",
                text: "Data ini akan terhapus pada sistem!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('delData') }}/"+id,
                    data: { '_token': "{{ csrf_token() }}"},
                    success: function(response){
                    table.ajax.reload();  // For reloading the table
                    Swal.fire({
                        title: "Terhapus!",
                        text: response.message,
                        icon: "success"
                    });
                    },
                    error: function(err){
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: err.responseJSON.message,
                    });
                    }
                });
                }
            });
        });


    </script>
@endpush