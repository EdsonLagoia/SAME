<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->integer('chart');
            $table->string('name', 100)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('social_name', 100)->nullable();
            $table->string('rg', 15)->nullable();
            $table->char('cpf', 14)->nullable();
            $table->char('cns', 18)->nullable();
            $table->string('breed', 80)->nullable();
            $table->string('sex', 11)->nullable();
            $table->char('phone', 15)->nullable();
            $table->string('affiliation1', 100);
            $table->string('affiliation2', 100)->nullable();
            $table->char('cep', 10)->nullable();
            $table->text('address')->nullable();
            $table->longText('informations')->nullable();
            
            $table->foreign('user')->references('id')->on('users');
        });

        DB::statement('ALTER TABLE patients CHANGE chart chart INT(6) UNSIGNED ZEROFILL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
