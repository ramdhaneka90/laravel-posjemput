<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKantorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('offices')) {
            Schema::dropIfExists('offices');
        }

        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_unit');
            $table->text('address');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('office_id')
                ->references('id')
                ->on('offices')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
    /**

     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
        Schema::disableForeignKeyConstraints();
    }
}
