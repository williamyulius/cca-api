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
        Schema::create('set_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MsGroup::class);
            $table->string('group');
            $table->string('unit');
            $table->string('campus');
            $table->string('semester');
            $table->string('academic_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_groups');
    }
};
