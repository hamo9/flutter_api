<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\categories;
use App\Models\resturants;
use Illuminate\Database\Seeder;
use App\Models\resturant_list_img;
use App\Models\resturant_list_menu;
use App\Models\resturant_list_phon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {

        User::insert([
            'name'  => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('ahmed1998')
        ]);

        User::insert([
            'name'  => 'hamada',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('10001000')
        ]);


        categories::insert([
            'name' => 'first',
            'img' => 'img test',
        ]);

        categories::insert([
            'name' => 'tow',
            'img' => 'img test',
        ]);

        categories::insert([
            'name' => 'theree',
            'img' => 'img test',
        ]);

        resturants::insert([
            'name' => 'Hamada',
            'title' => 'test re',
            'location' => 'rr',
            'profile_img' => 'rr',
            'cover_img' => 'rr',
            'id_category' => 1,

        ]);

        resturants::insert([
            'name' => 'Hamada',
            'title' => 'test re',
            'location' => 'rr',
            'profile_img' => 'rr',
            'cover_img' => 'rr',
            'id_category' => 2,

        ]);

        resturants::insert([
            'name' => 'Hamada',
            'title' => 'test re',
            'location' => 'rr',
            'profile_img' => 'rr',
            'cover_img' => 'rr',
            'id_category' => 3,
        ]);

        resturant_list_img::insert([
            'id_resturant' => 1,
            'img' => 'one',
        ]);

        resturant_list_img::insert([
            'id_resturant' => 1,
            'img' => 'tow',
        ]);


        resturant_list_img::insert([
            'id_resturant' => 1,
            'img' => 'three',
        ]);

        resturant_list_phon::insert([
            'id_resturant' => 1,
            'phone' => '01234566555',
        ]);

        resturant_list_phon::insert([
            'id_resturant' => 1,
            'phone' => '0113366666',
        ]);

        resturant_list_phon::insert([
            'id_resturant' => 1,
            'phone' => '01536666655',
        ]);

        resturant_list_menu::insert([
            'id_resturant' => 1,
            'menu_img' => 'meat',
        ]);

        resturant_list_menu::insert([
            'id_resturant' => 1,
            'menu_img' => 'koshary',
        ]);


    }
}
