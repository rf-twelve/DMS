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
        Schema::create('doc_actions', function (Blueprint $table) {
            $table->id();
            // $table->timestamp('date_time', $precision = 0)->nullable();
            $table->unsignedBigInteger('office_id');
            $table->string('is_received');
            $table->string('status');
            $table->string('refer_from');
            $table->string('refer_to');
            $table->string('action_taken')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('doc_id')->index();
            $table->foreign('doc_id')
                ->references('id')
                ->on('docs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('doc_actions');
    }
};
