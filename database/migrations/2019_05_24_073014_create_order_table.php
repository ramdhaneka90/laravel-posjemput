<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('orders')) {
            Schema::dropIfExists('orders');
        }

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('courier_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name_order');
            $table->string('category');
            $table->float('weight');
            $table->enum('status', ['on', 'off']);
            $table->integer('quantity');
            $table->string('name_receiver');
            $table->string('address_receiver');
            $table->bigInteger('total_bayar');
            $table->string('nama');
            $table->string('alamat');
            $table->string('phone');
            $table->unsignedBigInteger('customer_address_id');
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
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
        Schema::dropIfExists('orders');
        Schema::disableForeignKeyConstraints();
    }
}
