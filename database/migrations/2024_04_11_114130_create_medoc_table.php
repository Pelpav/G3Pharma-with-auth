<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medoc', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('prix', 8, 2);
            $table->text('description')->nullable();
            $table->bigInteger('stock');
            $table->text('fabricant');
            $table->timestamps();
            $table->boolean('deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medoc');
    }
}
