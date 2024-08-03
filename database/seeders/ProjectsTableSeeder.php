<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [];
        for ($i = 1; $i <= 10; $i++) {
            $projects[] = [
                'name' => 'Project ' . $i,
                'key' => Str::slug('Project ' . $i, '_'),
                'description' => 'Description for Project ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('projects')->insert($projects);
    }
}
