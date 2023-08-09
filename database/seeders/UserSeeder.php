<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        
        $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        
        User::create(['name'=>'reader', 'email'=>'reader@brs.com', 'password'=>$password, 'is_librarian'=>'0',]);
        User::create(['name'=>'reader2', 'email'=>'reader2@brs.com', 'password'=>$password, 'is_librarian'=>'0',]);

        User::create(['name'=>'librarian', 'email'=>'librarian@brs.com', 'password'=>$password, 'is_librarian'=>'1',]);
        User::create(['name'=>'librarian2', 'email'=>'librarian2@brs.com', 'password'=>$password, 'is_librarian'=>'1',]);
    }
}
