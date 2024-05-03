<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Student;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('nip', 5)->unique();
            $table->string('name', 50);
            $table->string('address', 100);
            $table->string('phone', 25);
            $table->integer('salary');
            $table->date('entry_date');
            $table->uuid('student_id');
            // $table->foreignIdFor(Student::class, 'student_id');

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
