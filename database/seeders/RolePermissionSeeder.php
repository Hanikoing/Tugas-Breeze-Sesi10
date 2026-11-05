<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Membersihkan cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Membuat daftar permission
        $permissions = [
            'view books',
            'create books',
            'edit books',
            'delete books',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Membuat role
        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $dosen = Role::firstOrCreate([
            'name' => 'Dosen',
            'guard_name' => 'web',
        ]);

        $mahasiswa = Role::firstOrCreate([
            'name' => 'Mahasiswa',
            'guard_name' => 'web',
        ]);

        // Memberikan permission kepada setiap role
        $admin->syncPermissions($permissions);

        $dosen->syncPermissions([
            'view books',
            'create books',
            'edit books',
        ]);

        $mahasiswa->syncPermissions([
            'view books',
        ]);

        // Membuat akun Admin
        $userAdmin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin12345'),
            ]
        );

        // Membuat akun Dosen
        $userDosen = User::firstOrCreate(
            ['email' => 'dosen@gmail.com'],
            [
                'name' => 'Dosen',
                'password' => Hash::make('dosen12345'),
            ]
        );

        // Membuat akun Mahasiswa
        $userMahasiswa = User::firstOrCreate(
            ['email' => 'mahasiswa@gmail.com'],
            [
                'name' => 'Mahasiswa',
                'password' => Hash::make('mahasiswa12345'),
            ]
        );

        // Menghubungkan akun dengan role
        $userAdmin->syncRoles([$admin]);
        $userDosen->syncRoles([$dosen]);
        $userMahasiswa->syncRoles([$mahasiswa]);
    }
}
