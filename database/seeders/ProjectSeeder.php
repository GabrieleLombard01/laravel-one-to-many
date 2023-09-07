<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $project = new Project();
            $project->title = $faker->text(20);
            $project->description = $faker->paragraphs(5, true);
            $project->slug = Str::slug($project->title, '-');
            $project->thumb = $faker->imageUrl(250, 250);
            //$project->category = $faker->text(10);
            $project->status = $faker->text(15);
            $project->save();
        }
    }
}
