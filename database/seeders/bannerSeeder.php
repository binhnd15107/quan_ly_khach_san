<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            DB::table('banners')->insert(
                [
                    'image' => 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg',
                    'bannerable_id' => null,
                    'bannerable_type' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]
            );
        }
    }
}
