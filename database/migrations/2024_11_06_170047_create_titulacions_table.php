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
        Schema::create('titulacions', function (Blueprint $table) {
            $table->id();
            $table->string('nro_acta')->unique();
            $table->string('nro_rd1')->unique();
            $table->string('nro_rd2')->unique()->nullable();
            $table->string('titulando1');
            $table->string('titulando2')->nullable();
            $table->string('promocion');
            $table->unsignedBigInteger('programa_id');
            $table->foreign('programa_id')
                ->references('id')
                ->on('programas')
                ->onDelete('cascade');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->date('fecha_titulacion');
            $table->float('nota_titulando1');
            $table->float('nota_titulando2')->nullable();
            $table->text('nombre_proyecto');
            $table->unsignedBigInteger('jurado1');
            $table->unsignedBigInteger('jurado2')->nullable();
            $table->unsignedBigInteger('presidente');
            $table->foreign('jurado1')
                ->references('id')
                ->on('docentes')
                ->onDelete('cascade');
            $table->foreign('jurado2')
                ->references('id')
                ->on('docentes')
                ->onDelete('cascade');
            $table->foreign('presidente')
                ->references('id')
                ->on('docentes')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titulacions');
    }
};
