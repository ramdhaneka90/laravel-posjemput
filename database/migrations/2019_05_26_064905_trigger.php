<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER log_order AFTER INSERT ON orders FOR EACH ROW 
            BEGIN
                INSERT INTO log_activities SET order_id = NEW.id, message = 'Order baru telah ditambahkan!', category = 'INSERT';
            END");

        DB::unprepared("CREATE TRIGGER log_approved_order AFTER UPDATE ON orders FOR EACH ROW 
            BEGIN
                INSERT INTO log_activities SET order_id = OLD.id, message = 'Order anda telah disetujui!', category = 'UPDATE';
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `log_order`');
    }
}
