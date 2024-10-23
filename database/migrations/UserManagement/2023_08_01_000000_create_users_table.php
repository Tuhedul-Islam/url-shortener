<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('generated_unique_id')->nullable();
            $table->string('language')->nullable()->default('en');
            $table->integer('district_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('phone')->unique();
            $table->string('whatsapp_no')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('reference_no')->nullable();
            $table->string('password')->nullable();
            $table->text('profile_image')->nullable();
            $table->float('incentive', 16, 2)->default(0.00)->comment('incentive in percentage');
            $table->float('balance', 16, 2)->default(0.00);
            $table->enum('balance_type_id', [1, 2])->default(1)->comment('1=Unlimited, 2=Limited');
            $table->tinyInteger('two_factor_enabled')->default(0);
            $table->foreignId('user_role_id')->nullable()->comment('Role Table ID')->references('id')->on('roles')->onDelete('cascade');
            $table->enum('user_type_id', [1, 2, 3, 4, 5])->nullable()->comment('1=Admin, 2=Sub-Admin, 3=Student, 4=Teacher, 5=Others');
            $table->date('user_expire_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
