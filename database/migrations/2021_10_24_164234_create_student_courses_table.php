<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id");
            $table->foreignId("course_id");
            $table->integer("semester");
            $table->timestamps();

            //foreign key, relation to students
            $table->foreign("student_id")->references("id")->on("students")->onDelete("cascade")->onUpdate("cascade");
            //foreign key, relation to courses
            $table->foreign("course_id")->references("id")->on("courses")->onDelete("cascade")->onUpdate("cascade");
        });

        // insert student_courses (connection of students and courses)
        DB::table('student_courses')->insert(
            [
                [
                    'course_id' => 1,
                    'student_id' => 1,
                    'semester' => 1
                ],
                [
                    'course_id' => 1,
                    'student_id' => 2,
                    'semester' => 1
                ],
                [
                    'course_id' => 4,
                    'student_id' => 3,
                    'semester' => 2
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_courses');
    }
}
