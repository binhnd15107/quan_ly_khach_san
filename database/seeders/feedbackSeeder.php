<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class feedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('feedback')->insert(
                [

                    'kh_id' =>  User::role('khach hang')->get()->random()->id,
                    'content' => 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]
            );
        }
    }
}
