<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'Возможность добавлять клиентов']);
        Permission::create(['name'=>'Возможность удалять клиентов']);
        Permission::create(['name'=>'Возможность редактировать клиентов']);

        Permission::create(['name'=>'Возможность добавлять лидов']);
        Permission::create(['name'=>'Возможность удалять лидов']);
        Permission::create(['name'=>'Возможность редактировать лидов']);

        Permission::create(['name'=>'Возможность добавлять отделы']);
        Permission::create(['name'=>'Возможность удалять отделы']);
        Permission::create(['name'=>'Возможность редактировать отделы']);

    }
}
