<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->truncate();
        // Genre::factory()->count(7)->create();
        Genre::create(['name'=>'Romance', 'style'=>'primary']);
        Genre::create(['name'=>'Comedy', 'style'=>'secondary']);
        Genre::create(['name'=>'Action', 'style'=>'success']);
        Genre::create(['name'=>'History', 'style'=>'danger']);
        Genre::create(['name'=>'Classic', 'style'=>'danger']);
        Genre::create(['name'=>'Horror', 'style'=>'warning']);
        Genre::create(['name'=>'Fantasy', 'style'=>'warning']);

    }
}
