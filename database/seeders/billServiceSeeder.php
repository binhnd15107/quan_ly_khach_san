<?php

namespace Database\Seeders;

use App\Models\bill;
use App\Models\service;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class billServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 0; $i < 10; $i++) {
            $service = service::all()->random();
            $amount = rand(1, 10);
            DB::table('bill_sevices')->insert(
                [

                    'bill_id' => bill::all()->random()->id,
                    'service_id' =>  $service->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'amount' => $amount,
                    'total_many' => ($service->price * $amount),
                ]
            );
        }
    }
}
