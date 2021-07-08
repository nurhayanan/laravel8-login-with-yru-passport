<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddColumnsToUsersTable
 */
class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('prefix')->nullable(); //  คำนำหน้า ตามบัตรประชาชน
            $table->string('prefix_edu')->nullable(); // คำนำหน้า ทางสายการศึกษา
            $table->string('fname')->nullable(); // ชื่อ
            $table->string('lname')->nullable(); // นามสกุล
            $table->string('job_position')->nullable(); // ตำแหน่ง
            $table->string('academic_position')->nullable(); // ตำแหน่งทางวิชาการ
            $table->string('board_position')->nullable(); // ตำแหน่งบริหาร
            $table->string('department')->nullable(); // หน่วยงานสังกัด
            $table->string('board_department')->nullable(); // หน่วยงานบริหาร
            $table->text('address_present')->nullable(); // ที่อยู่ปัจจุบัน
            $table->text('address_permanent')->nullable(); // ที่อยู่ภูมิลำเนา
            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
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
                'username',
                'prefix',
                'prefix_edu',
                'fname',
                'lname',
                'job_position',
                'academic_position',
                'board_position',
                'department',
                'board_department',
                'address_present',
                'address_permanent',
                'mobile',
                'telephone'
            ]);
        });
    }
}
