<?php

namespace Database\Seeders;

use App\Models\room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class billSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [54];
        DB::table('bills')->insert(
            [
                'name' => ' Hóa đơn 4',
                'room_id' => Json_encode($data),
                'kh_id' =>  User::role('khach hang')->get()->random()->id,
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now()->addDays(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'total_money' => rand(500000, 1000000),
            ]
        );
        foreach ($data as $q) {
            DB::table('rooms')
                ->where('id', '=', $q)
                ->update(['current_status' => 1]);
        }
    }
}
