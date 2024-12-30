<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hand_overs', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm');
            $table->string('nama_pasien');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk');
            $table->string('ruang');
            $table->string('dpjp');
            $table->text('diagnosa_masuk')->nullable();
            $table->text('keluhan_saat_ini')->nullable();

            $table->text('riwayat_penyakit_dahulu')->nullable();
            $table->text('therapi_dari_dpjp')->nullable();
            $table->text('alergi')->nullable();
            
            $table->string('kesadaran', 50)->nullable();
            $table->string('td', 20)->nullable();
            $table->string('nadi', 20)->nullable();
            $table->string('nafas', 20)->nullable();
            $table->string('suhu', 20)->nullable();
            $table->string('gcs', 20)->nullable();
            $table->text('pemeriksaan_fisik')->nullable();
            $table->text('hasil_lab_abnormal')->nullable();
            $table->text('iv_line_fluids')->nullable();
            $table->text('pemeriksaan_penunjang')->nullable();

            $table->text('tindakan_keperawatan')->nullable();
            $table->text('intruksi_dokter')->nullable();
            
            $table->string('pemberi_operan', 100)->nullable();
            $table->string('penerima_operan', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hand_overs');
    }
};
