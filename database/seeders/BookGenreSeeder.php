<?php

namespace Database\Seeders;

use App\Models\book_genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('book_genre')->truncate();
        book_genre::factory()->count(15)->create();
    }
}
