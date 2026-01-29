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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->enum('status', ['applied', 'screening', 'interview', 'accepted', 'rejected'])->default('applied');
            $table->enum('screening_result', ['match', 'partial', 'not_match'])->nullable();
            $table->enum('current_step', ['screening', 'interview', 'final'])->default('screening');
            $table->timestamps();
            $table->unique(['applicant_id', 'job_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
