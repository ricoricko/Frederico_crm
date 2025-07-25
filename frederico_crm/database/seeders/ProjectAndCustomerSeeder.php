<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\User;
use App\Models\Product;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class ProjectAndCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leads = Lead::all();
        $salesUsers = User::where('role', 'sales')->get();
        $managerUsers = User::where('role', 'manager')->get();
        $products = Product::all();

        if ($leads->isEmpty() || $salesUsers->isEmpty() || $managerUsers->isEmpty() || $products->isEmpty()) {
            $this->command->info('Please run UserSeeder, ProductSeeder, and LeadSeeder first.');
            return;
        }

        
        $approvedLeads = $leads->take(8);
        foreach ($approvedLeads as $lead) {
            $sales = $salesUsers->random();
            $manager = $managerUsers->random();
            $product = $products->random();

            DB::transaction(function () use ($lead, $sales, $manager, $product) {
                $project = Project::create([
                    'lead_id' => $lead->id,
                    'user_id' => $sales->id,
                    'product_id' => $product->id,
                    'status' => 'approved',
                    'approved_by' => $manager->id,
                    'approved_at' => now()->subDays(rand(1, 30)),
                ]);

                $customer = Customer::create([
                    'name' => $lead->name,
                    'email' => $lead->email,
                ]);

                $customer->products()->attach($product->id);
            });
        }

        $pendingLeads = $leads->skip(8)->take(7);
        foreach ($pendingLeads as $lead) {
            Project::create([
                'lead_id' => $lead->id,
                'user_id' => $salesUsers->random()->id,
                'product_id' => $products->random()->id,
                'status' => 'pending',
            ]);
        }
    }
}