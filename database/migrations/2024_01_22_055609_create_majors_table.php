<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('majors', function (Blueprint $table) {
            //major_id	int PK,
            //name		varchar (50) not null,
            //name_en	varchar (50) not null,
            $table->integer('major_id')->primary();
            $table->char('name', 50)->nullable(0);
            $table->char('name_en', 50)->nullable(0);
            
            $table->timestamps($precision = 0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
