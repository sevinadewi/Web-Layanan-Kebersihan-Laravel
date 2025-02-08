<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}


// public function up() { ... }

// Fungsi up() berisi perintah untuk melakukan perubahan dalam database saat migrasi dijalankan (php artisan migrate).
// Schema::table('users', function (Blueprint $table) { ... });

// Schema::table('users', ...) menunjukkan bahwa kita ingin mengubah struktur tabel users yang sudah ada.
// Blueprint $table adalah objek yang digunakan untuk menambahkan, mengubah, atau menghapus kolom dalam tabel.
// $table->string('role')->default('user')->after('password');

// $table->string('role') → Menambahkan kolom baru bernama role dengan tipe data VARCHAR (string).
// ->default('user') → Menetapkan nilai default "user" untuk kolom role. Jika nilai tidak diisi saat insert data, maka otomatis bernilai "user".
// ->after('password') → Menentukan posisi kolom role agar diletakkan setelah kolom password dalam tabel users.