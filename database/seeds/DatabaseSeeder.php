<?php

use App\Models\Admin;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\CompanyCategory::class, 3)->create();
        factory(\App\Models\Company::class, 5)->create();
        factory(\App\Models\Food::class, 10)->create();

    }
}
