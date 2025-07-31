<?php

use App\Models\MsClass;
use App\Models\MsGroup;
use App\Models\MsStudent;
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
        Schema::create('tr_student_co_curricular_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MsSubjectCoCurricularActivity::class);
            $table->foreignIdFor(MsStudent::class);
            $table->foreignIdFor(MsClass::class);
            $table->foreignIdFor(MsGroup::class);
            $table->string('semester');
            $table->string('academic_year');
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
        Schema::dropIfExists('tr_student_co_curricular_activities');
    }
};
