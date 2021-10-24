<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("programme_id");
            $table->string("name");
            $table->string("description");
            $table->timestamps();

            //foreign key, relation to programmes
            $table->foreign("programme_id")->references("id")->on("programmes")->onDelete("cascade")->onUpdate("cascade");
        });

        //inserted courses
        DB::table('courses')->insert(
            [
                [
                    'programme_id' => 1,
                    'name' => 'PHP',
                    'description' => 'Develop web applications in PHP using Laravel',
                    'created_at' => now()
                ],
                [
                    'programme_id' => 1,
                    'name' => 'Webdesign Essentials',
                    'description' => 'Learn the basics of web development',
                    'created_at' => now()
                ],
                [
                    'programme_id' => 1,
                    'name' => 'IoT Essentials',
                    'description' => 'Internet of Things is awesome!',
                    'created_at' => now()
                ],
                [
                    'programme_id' => 2,
                    'name' => 'Communication',
                    'description' => 'Learn to communicate with other people',
                    'created_at' => now()
                ],
                [
                    'programme_id' => 2,
                    'name' => 'Intercultural Relations Management',
                    'description' => 'Be ready to conquer the world',
                    'created_at' => now()
                ],
                [
                    'programme_id' => 5,
                    'name' => 'Anatomy',
                    'description' => 'Study the structure of organisms and their parts',
                    'created_at' => now()
                ],
                [
                    'programme_id' => 5,
                    'name' => 'How To Communicate As A Caregiver?',
                    'description' => 'Communication strategies between caregiver and patient',
                    'created_at' => now()
                ],
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
        Schema::dropIfExists('courses');
    }
}
