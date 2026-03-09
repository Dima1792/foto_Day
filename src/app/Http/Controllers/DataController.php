<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Meeting;
use App\Models\Photo;
use App\Models\Stand;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DataController extends Controller
{
    public function addData()
    {
        $t1 = microtime(true);

        $userIds = [];
        for ($i = 1; $i <= 5; $i++) {
            $rand = rand(200, 100000);
            $userIds[] = User::query()->insertGetId([
                'name' => "User $i",
                'email' => "user$i-$rand@example.com",
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


        // 3. Вставка Агентств (Agencies)
        $agencyIds = [];
        for ($i = 1; $i <= 15; $i++) {
            $agencyIds[] = Agency::query()->insertGetId([
                'name' => "Agency $i",
                'type' => $i % 2 == 0 ? 'group' : 'to_myself',
                'percentage' => rand(10, 30),
                'logo' => "logo_$i.png",
                'url' => "https://agency$i.com",
            ]);
        }

        // 4. Вставка Встреч (Meetings)
        foreach ($agencyIds as $agencyId) {
            for ($j = 1; $j <= 5; $j++) {
                $meetingId = Meeting::query()->insertGetId([
                    'user_id' => $userIds[array_rand($userIds)],
                    'agency_id' => $agencyId,
                    'date_start' => Carbon::now()->addDays(rand(1, 10)),
                    'date_end' => Carbon::now()->addDays(rand(11, 20)),
                    'name' => "Meeting $j for Agency $agencyId",
                    'link' => "https://zoom.us" . Str::random(10),
                    'sum_default' => rand(1000, 5000),
                ]);

                // 5. Вставка Стендов (Stands) для каждой встречи
                for ($k = 1; $k <= 2; $k++) {
                    $standId = Stand::query()->insertGetId([
                        'code' => Str::uuid(),
                        'meeting_id' => $meetingId,
                        'user_id' => $userIds[array_rand($userIds)],
                        'status' => rand(1, 4),
                    ]);

                    // 6. Вставка Фотографий (Photos) для каждого стенда
                    for ($p = 1; $p <= 3; $p++) {
                        Photo::query()->insert([
                            'stand_id' => $standId,
                            'real_name_full' => "photo_full_$p.jpg",
                            'user_name' => "Customer $p",
                            'name_mini' => "photo_thumb_$p.jpg",
                            'sum' => rand(100, 500),
                            'sum_for_client' => rand(600, 1000),
                            'date_last_order' => Carbon::now(),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                }
            }
        }

        $result_t = microtime(true) - $t1;

//        User::query()->insert([
//            [
//                User::FIELD_EMAIL => 'test1@ro.ru',
//                User::FIELD_NAME => 'Пользователь',
//                User::FIELD_PASSWORD => Hash::make('123456'),
//            ],
//            [
//                User::FIELD_EMAIL => 'test2@ro.ru',
//                User::FIELD_NAME => 'Пользователь2',
//                User::FIELD_PASSWORD => Hash::make('123456'),
//            ],
//            [
//                User::FIELD_EMAIL => 'test3@ro.ru',
//                User::FIELD_NAME => 'Пользователь3',
//                User::FIELD_PASSWORD => Hash::make('123456'),
//            ],
//        ]);


        return 'ok ' . $result_t;
    }
}
