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
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->nullable()->after('password');
            $table->integer('phone')->nullable()->after('company_name');
            $table->date('expiry_date')->nullable()->after('phone');
            $table->string('role')->after('expiry_date');
            
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
          
            $table->dropColumn([
                'company_name',
                'phone',
                'expiry_date',
                'role',
            ]);


        });
    }
};
