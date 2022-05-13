<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomDiTabelUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 20)->after('id')->nullable()->unique();
            $table->date('dob')->after('password')->nullable();
            $table->string('phone', 20)->after('dob')->nullable();
            $table->text('address')->after('phone')->nullable();
            $table->text('picture')->after('address')->nullable();
            $table->integer('role', 20)->after('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('dob');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('picture');
        });
    }
}
