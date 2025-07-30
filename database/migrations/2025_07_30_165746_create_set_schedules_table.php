<?php

use App\Models\MsGroup;
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
        Schema::create('set_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MsGroup::class);
            $table->timestamp('enrollment_start_date');
            $table->timestamp('enrollment_end_date');
            $table->string('semester');
            $table->string('academic_year');
            $table->string('status');
            $table->string('unit');
            $table->string('campus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_schedules');
    }
};
