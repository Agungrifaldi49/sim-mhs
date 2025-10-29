<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
        $table->id();
        $table->string('foto')->nullable();
        $table->string('fakultas')->nullable();
        $table->string('program_studi')->nullable();
        $table->string('program')->nullable();
        $table->unsignedTinyInteger('semester')->nullable();
        $table->string('kelas')->nullable();
        $table->string('npm')->unique();
        $table->string('nama_lengkap');
        $table->string('tempat_lahir')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
        $table->string('agama')->nullable();
        $table->string('no_hp')->nullable();
        $table->string('email')->unique();
        $table->string('email_affiliasi')->nullable();
        $table->text('alamat_lengkap')->nullable();
        $table->enum('status', ['Belum Aktif', 'Aktif', 'Cuti', 'Lulus', 'Dropout'])->default('Belum Aktif');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
