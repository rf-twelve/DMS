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
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_time')->nullable();
            $table->string('status');
            $table->unsignedInteger('office_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamp('start', $precision = 0)->nullable();
            $table->timestamp('end', $precision = 0)->nullable();
            $table->string('elapse')->nullable();
            $table->tinyInteger('is_open');
            $table->unsignedBigInteger('doc_id')->index();
            $table->foreign('doc_id')
                ->references('id')
                ->on('docs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_trails');
    }
};
