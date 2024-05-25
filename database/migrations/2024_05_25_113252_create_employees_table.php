<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id("employee_id")->autoIncrement();
            $table->string("name");
            $table->string("user_prefix");
            $table->string("first_name");
            $table->string("middle_inital");
            $table->string("last_name");
            $table->char("gender");
            $table->string("email")->unique();
            $table->date("date_of_birth");
            $table->timestamp("time_of_birth");
            $table->integer("age_in_years");
            $table->date("date_of_joining");
            $table->integer("age_in_company_years");
            $table->string("phone_no");
            $table->string("place_name");
            $table->string("county");
            $table->string("city");
            $table->string("zip");
            $table->string("region");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
