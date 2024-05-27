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
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->string('tn');
            $table->string('date');
            $table->string('time');
            $table->string('received_by');
            $table->text('origin')->nullable();
            $table->text('nature')->nullable();
            $table->string('class');
            $table->string('type');
            $table->string('for');
            $table->text('remarks')->nullable();
            $table->string('status')->nullable();
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('author_office');
            $table->unsignedInteger('updated_by')->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('docs');
    }
};
