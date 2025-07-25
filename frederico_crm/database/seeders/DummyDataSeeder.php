<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Lead;
use App\Models\Project;
use App\Models\Customer;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET session_replication_role = \'replica\';');
        Project::truncate();
        Customer::truncate();
        Lead::truncate();
        Product::truncate();
        User::truncate();
        DB::statement('SET session_replication_role = \'origin\';');

        $manager = User::create([
            'name' => 'Manager Person',
            'email' => 'manager@smart.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
        ]);

        $sales = User::create([
            'name' => 'Sales Person',
            'email' => 'sales@smart.com',
            'password' => Hash::make('password'),
            'role' => 'sales',
        ]);

        $product1 = Product::create(['name' => 'Home Basic 50 Mbps', 'price' => 299000]);
        $product2 = Product::create(['name' => 'Home Pro 100 Mbps', 'price' => 450000]);
        $product3 = Product::create(['name' => 'Business Fast 200 Mbps', 'price' => 750000]);

        $lead1 = Lead::create(['name' => 'PT. Maju Jaya', 'email' => 'maju@jaya.com', 'phone' => '081234567890']);
        $lead2 = Lead::create(['name' => 'CV. Abadi Sentosa', 'email' => 'abadi@sentosa.com', 'phone' => '081234567891']);
        $lead3 = Lead::create(['name' => 'Warung Kopi Bahagia', 'email' => 'kopi@bahagia.com', 'phone' => '081234567892']);
        $lead4 = Lead::create(['name' => 'Klinik Sehat Selalu', 'email' => 'klinik@sehat.com', 'phone' => '081234567893']);
        $lead5 = Lead::create(['name' => 'Toko Roti Enak', 'email' => 'roti@enak.com', 'phone' => '081234567894']);

      
        $project1 = Project::create([
            'lead_id' => $lead1->id, 'user_id' => $sales->id, 'product_id' => $product3->id,
            'status' => 'approved', 'approved_by' => $manager->id, 'approved_at' => now(),
        ]);
        $customer1 = Customer::create(['name' => $lead1->name, 'email' => $lead1->email]);
        $customer1->products()->attach($project1->product_id);

        $project2 = Project::create([
            'lead_id' => $lead2->id, 'user_id' => $sales->id, 'product_id' => $product2->id,
            'status' => 'approved', 'approved_by' => $manager->id, 'approved_at' => now()->subDays(5),
        ]);
        $customer2 = Customer::create(['name' => $lead2->name, 'email' => $lead2->email]);
        $customer2->products()->attach($project2->product_id);

        Project::create([
            'lead_id' => $lead3->id, 'user_id' => $sales->id, 'product_id' => $product1->id,
            'status' => 'pending',
        ]);
        
        Project::create([
            'lead_id' => $lead4->id, 'user_id' => $sales->id, 'product_id' => $product2->id,
            'status' => 'pending',
        ]);

    }
}