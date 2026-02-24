<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Models;

class ModelSeeder extends Seeder
{
    public function run(): void
    {
        Models::truncate();

        $module = 'Administrator';

        $components = [
            [
                'name' => 'Dashboard',
                'icon' => 'fas fa-chart-line',
                'subs' => [
                    [
                        'name' => 'Dashboard',
                        'code' => 'dashboard',
                        'route' => 'admin',
                    ]
                ]
            ],
            [
                'name' => 'List',
                'icon' => 'fas fa-list',
                'subs' => [
                    [
                        'name' => 'List',
                        'code' => 'list',
                        'route' => 'admin.list',
                    ]
                ]
            ]
        ];

        $id = 1;
        $component_no = 1;

        foreach ($components as $component) {

            $sub_no = 1;

            foreach ($component['subs'] as $sub) {

                Models::create([
                    'id' => $id,
                    'module' => $module, // ADMIN SAHAJA
                    'component_no' => $component_no,
                    'components' => $component['name'],
                    'sub_components_no' => $sub_no,
                    'sub_components_name' => $sub['name'],
                    'sub_components' => $sub['code'],
                    'route' => $sub['route'],
                    'comp_icon' => $component['icon'],
                ]);

                $id++;
                $sub_no++;
            }

            $component_no++;
        }
    }
}
