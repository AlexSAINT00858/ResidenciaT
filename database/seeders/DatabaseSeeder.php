<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\OfferWithData;
use App\Models\OfferWithOutData;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("admin123"),
        ]);

//        Company::create([
//            'nameCompany' => 'osapat',
//            'address' => 'calle 8 Norte',
//            'phoneNumber' => '2381204152',
//            'email' => 'osapat@gmail.com',
//            'logo' => 'empresa.png',
//        ]);
//
//        Company::create([
//            'nameCompany' => 'ferrepat',
//            'address' => 'calle Poniente',
//            'phoneNumber' => '2381208574',
//            'email' => 'ferrepat@gmail.com',
//            'logo' => 'empresa.png',
//        ]);
//
//        Company::create([
//            'nameCompany' => 'corona',
//            'address' => 'calle 16 de Septiembre',
//            'phoneNumber' => '2384529371',
//            'email' => 'corona@gmail.com',
//            'logo' => 'empresa.png',
//        ]);
//
//        Company::create([
//            'nameCompany' => 'patsa',
//            'address' => 'calle Amado Nervo',
//            'phoneNumber' => '2387538241',
//            'email' => 'patsa@gmail.com',
//            'logo' => 'empresa.png',
//        ]);
//
//        OfferWithData::factory(20)->create();
//        OfferWithOutData::factory(20)->create();
    }
}
