<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert(
                [
                    'title' => 'bai post ' . $i,
                    'slug' => 'bai-post-' . $i,
                    'author' =>  User::role(['nhan vien', 'admin'])->get()->random()->id,
                    'content' => 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình',
                    'image' => 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg',
                    'describe' => 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]
            );
        }
    }
}
