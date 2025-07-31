<?php

use App\Models\MsGroup;
use App\Models\MsSubjectCoCurricularActivity;
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
        Schema::create('set_subject_co_curricular_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MsGroup::class);
            $table->foreignIdFor(MsSubjectCoCurricularActivity::class);
            $table->integer('quota');
            $table->string('semester');
            $table->string('academic_year');
            $table->string('unit');
            $table->string('campus');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_subject_co_curricular_activities');
    }
};
