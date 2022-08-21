<?php

namespace Database\Seeders;

use App\Models\discountCode;
use App\Models\room;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class codeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('code_rooms')->insert(
                [
                    'room_id' => room::all()->random()->id,
                    'discount_code_id' => discountCode::all()->random()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]
            );
        }
    }
}
