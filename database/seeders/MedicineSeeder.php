<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;
use App\Models\Type;

class MedicineSeeder extends Seeder
{
    public function run(): void
    {
        
        $a = Type::create(['name' => 'Tablet']);
        $b = Type::create(['name' => 'Capsule']);
        $c = Type::create(['name' => 'Syrup']);


        Medicine::create([
            'name' => 'Paracetamol',
            'stock' => 100,
            'expiry_date' => '2027-03-15',
            'type_id' => $a->id,
            'is_available' => true,
        ]);

        Medicine::create([
            'name' => 'Amoxicillin',
            'stock' => 50,
            'expiry_date' => '2027-11-20',
            'type_id' => $b->id,
            'is_available' => true,
        ]);

        Medicine::create([
            'name' => 'Losartan',
            'stock' => 10,
            'expiry_date' => '2027-12-25',
            'type_id' => $a->id,
            'is_available' => true,
        ]);

        Medicine::create([
            'name' => 'Cetirizine',
            'stock' => 20,
            'expiry_date' => '2027-09-30',
            'type_id' => $c->id,
            'is_available' => true,
        ]);

        Medicine::create([
            'name' => 'Ibuprofen',
            'stock' => 30,
            'expiry_date' => '2028-02-28',
            'type_id' => $a->id,
            'is_available' => false,
        ]);
    }
}