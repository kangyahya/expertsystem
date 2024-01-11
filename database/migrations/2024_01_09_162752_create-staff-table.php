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
      Schema::create('staff', function (Blueprint $table) {
        $table->id();
        $table->string('user_id');
        $table->string('jabatan','100')->nullable();
        $table->date('tanggal')->default(now());
        $table->enum('jenis_kelamin',['L','P'])->default('L');
        $table->text('alamat')->nullable();
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
