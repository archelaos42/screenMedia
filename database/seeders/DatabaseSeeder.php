<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => 1,
        ]);

        DB::table('campaigns')->insert([
            'name' => 'dickins',
            'start' => '2024-01-01',
            'end' => '2024-01-07',
            'status' => 'active',
        ]);

        DB::table('boards')->insert([
            'code' => '56034',
            'type' => 'megaboard',
            'address' => 'Svetogorska 120',
            'image' => '333714.webp',
            'googlelink' => 'https://www.google.com/maps'
        ]);

        DB::table('boards')->insert([
            'code' => '18645',
            'type' => 'cityboard',
            'address' => 'Brace Jugovica 39',
            'image' => '441521.webp',
            'googlelink' => 'https://www.google.com/maps'
        ]);

        DB::table('boards')->insert([
            'code' => '07580',
            'type' => 'bigboard',
            'address' => 'Molnerova 50',
            'image' => '516522.jpeg',
            'googlelink' => 'https://www.google.com/maps'
        ]);

        DB::table('boards')->insert([
            'code' => '97567',
            'type' => 'megaboard',
            'address' => 'Admirala Geparda 12',
            'image' => '752987.jpeg',
            'googlelink' => 'https://www.google.com/maps'
        ]);

        DB::table('boards')->insert([
            'code' => '58402',
            'type' => 'bigboard',
            'address' => 'Beogradska 141',
            'image' => '333714.webp',
            'googlelink' => 'https://www.google.com/maps'
        ]);

        DB::table('bookings')->insert([
            'campaign_id' => '1',
            'board_id' => '1',
            'status' => 'active',
            'start' => '2024-01-01',
            'end' => '2024-01-07',
        ]);

        DB::table('bookings')->insert([
            'campaign_id' => '1',
            'board_id' => '2',
            'status' => 'active',
            'start' => '2024-01-01',
            'end' => '2024-01-07',
        ]);

        DB::table('bookings')->insert([
            'campaign_id' => '1',
            'board_id' => '3',
            'status' => 'active',
            'start' => '2024-01-01',
            'end' => '2024-01-07',
        ]);

//        DB::table('board_booking')->insert([
//            'board_id' => '1',
//            'booking_id' => '1',
//            'start' => '2024-01-01',
//            'end' => '2024-01-07',
//        ]);
//
//        DB::table('board_booking')->insert([
//            'board_id' => '2',
//            'booking_id' => '1',
//            'start' => '2024-01-01',
//            'end' => '2024-01-07',
//        ]);
//
//        DB::table('board_booking')->insert([
//            'board_id' => '3',
//            'booking_id' => '1',
//            'start' => '2024-01-01',
//            'end' => '2024-01-07',
//        ]);
    }
}
