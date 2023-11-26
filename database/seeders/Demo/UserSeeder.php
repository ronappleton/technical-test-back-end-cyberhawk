<?php

declare(strict_types=1);

namespace Database\Seeders\Demo;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedUsers();
        $this->seedRoles();
        $this->seedPermissions();
        $this->seedRolePermissions();
        $this->attachUsersToRoles();
    }

    private function seedUsers(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'non-inspection',
            'password' => Hash::make('password'),
        ]);
    }

    private function seedRoles(): void
    {
        $roles = [
            'admin',
            'non-inspection',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }

    private function seedPermissions(): void
    {
        $permissions = [
            'view inspections',
            'view grades',
            'view grade types',
            'view components',
            'view component types',
            'view turbines',
            'view farms',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }
    }

    private function seedRolePermissions(): void
    {
        $rolePermissions = [
            'admin' => [
                'view inspections',
                'view grades',
                'view grade types',
                'view components',
                'view component types',
                'view turbines',
                'view farms',
            ],
            'non-inspection' => [
                'view turbines',
                'view farms',
                'view components',
                'view component types',
            ],
        ];

        foreach ($rolePermissions as $role => $permissions) {
            foreach ($permissions as $permission) {
                Role::findByName($role)->givePermissionTo($permission);
            }
        }
    }

    private function attachUsersToRoles(): void
    {
        $userRoles = [
            'admin' => [
                'admin',
            ],
            'non-inspection' => [
                'non-inspection',
            ],
        ];

        foreach ($userRoles as $user => $roles) {
            foreach ($roles as $role) {
                $role = Role::where(['name' => $role])->first();
                User::where('username', $user)->first()->assignRole($role);
            }
        }
    }
}
