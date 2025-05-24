<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i= 0; $i < 3; $i++) 
        {
            $this->createCustomersWithInvoices(100, 10);
        }
    }

    private function createCustomersWithInvoices(int $nCustomers, int $nInvoices): void
    {
        $hasInvoices = random_int(0, $nInvoices);
        $nCustomers = random_int(5, $nCustomers);

        if($hasInvoices > 0)
        {
            // Crear n customers con m invoices relacionadas cada uno
            Customer::factory()
                ->count($nCustomers)
                ->has(Invoice::factory()->count($hasInvoices))
                ->create();
        }
        else
        {
            // Crear n customers
            Customer::factory()
                ->count($nCustomers)
                ->create();
        }
        
        // Customer::factory(25)->hasInvoices(10)->create(); // Método abreviado
    }
}
