<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usul_plot_pembimbings', function (Blueprint $table) {
            $table->id();
            $table->char('npm', 13)->unique();
            $table->string('nama');
            $table->string('jurusan');
            $table->string('pembimbing');
            $table->string('status');
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
        Schema::dropIfExists('usul_plot_pembimbings');
    }
};
