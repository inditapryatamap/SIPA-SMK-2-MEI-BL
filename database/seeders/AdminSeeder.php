<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->email = 1;
        $admin->email = 'admin@gmail.com';
        $admin->nis = '123456789';
        $admin->nama = 'Administrator-Man';
        $admin->password = bcrypt('12345678');
        $admin->created_at = Carbon::now();
        $admin->updated_at = Carbon::now();
        $admin->save();
    }
}
