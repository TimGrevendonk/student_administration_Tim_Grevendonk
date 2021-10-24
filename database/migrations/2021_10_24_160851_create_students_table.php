<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId("programme_id");
            $table->integer("student_number");
            $table->string("first_name");
            $table->string("last_name");
            $table->timestamps();

            //foreign key, relation to programmes
            $table->foreign("programme_id")->references("id")->on("programmes")->onDelete('cascade')->onUpdate('cascade');
        });

        // insert students
        DB::table('students')->insert(
            [
                [
                    'programme_id' => 1,
                    'student_number' => 1,
                    'first_name' => 'Rik',
                    'last_name' => 'Rikken'
                ],
                [
                    'programme_id' => 1,
                    'student_number' => 2,
                    'first_name' => 'Jos',
                    'last_name' => 'Jossen'
                ],
                [
                    'programme_id' => 2,
                    'student_number' => 1,
                    'first_name' => 'Gert',
                    'last_name' => 'Gerten'
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
        Schema::dropIfExists('students');
    }
}
