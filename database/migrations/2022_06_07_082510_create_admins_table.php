<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->tinyInteger('type')->comment('1:super-admin, 2: admin-user');
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        $data = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'type' => 1,
            'password' => Hash::make('secret'),
        ];

        DB::table('admins')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
