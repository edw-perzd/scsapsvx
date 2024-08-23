<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Cobrador']);
        $role3 = Role::create(['name' => 'Jefe']);
        
        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.destroy'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        
        Permission::create(['name' => 'cobros.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'cobros.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'cobros.pagar'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'cobros.ticket'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'beneficiarios.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'beneficiarios.register'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'beneficiarios.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'beneficiarios.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'beneficiarios.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'beneficiarios.destroy'])->syncRoles([$role1, $role3]);
        
        Permission::create(['name' => 'cobros.imprimir'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'reportes.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'reportes.dia'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'reportes.mes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'reportes.users'])->syncRoles([$role1, $role2]);
    }
}
