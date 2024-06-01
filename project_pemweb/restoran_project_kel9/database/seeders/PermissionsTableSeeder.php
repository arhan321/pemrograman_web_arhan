<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'management_sdm_access',
            ],
            [
                'id'    => 18,
                'title' => 'tim_create',
            ],
            [
                'id'    => 19,
                'title' => 'tim_edit',
            ],
            [
                'id'    => 20,
                'title' => 'tim_show',
            ],
            [
                'id'    => 21,
                'title' => 'tim_delete',
            ],
            [
                'id'    => 22,
                'title' => 'tim_access',
            ],
            [
                'id'    => 23,
                'title' => 'frontend_access',
            ],
            [
                'id'    => 24,
                'title' => 'sosial_medium_create',
            ],
            [
                'id'    => 25,
                'title' => 'sosial_medium_edit',
            ],
            [
                'id'    => 26,
                'title' => 'sosial_medium_show',
            ],
            [
                'id'    => 27,
                'title' => 'sosial_medium_delete',
            ],
            [
                'id'    => 28,
                'title' => 'sosial_medium_access',
            ],
            [
                'id'    => 29,
                'title' => 'footer_create',
            ],
            [
                'id'    => 30,
                'title' => 'footer_edit',
            ],
            [
                'id'    => 31,
                'title' => 'footer_show',
            ],
            [
                'id'    => 32,
                'title' => 'footer_delete',
            ],
            [
                'id'    => 33,
                'title' => 'footer_access',
            ],
            [
                'id'    => 34,
                'title' => 'profile_create',
            ],
            [
                'id'    => 35,
                'title' => 'profile_edit',
            ],
            [
                'id'    => 36,
                'title' => 'profile_show',
            ],
            [
                'id'    => 37,
                'title' => 'profile_delete',
            ],
            [
                'id'    => 38,
                'title' => 'profile_access',
            ],
            [
                'id'    => 39,
                'title' => 'about_create',
            ],
            [
                'id'    => 40,
                'title' => 'about_edit',
            ],
            [
                'id'    => 41,
                'title' => 'about_show',
            ],
            [
                'id'    => 42,
                'title' => 'about_delete',
            ],
            [
                'id'    => 43,
                'title' => 'about_access',
            ],
            [
                'id'    => 44,
                'title' => 'gallery_create',
            ],
            [
                'id'    => 45,
                'title' => 'gallery_edit',
            ],
            [
                'id'    => 46,
                'title' => 'gallery_show',
            ],
            [
                'id'    => 47,
                'title' => 'gallery_delete',
            ],
            [
                'id'    => 48,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 49,
                'title' => 'blog_create',
            ],
            [
                'id'    => 50,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 51,
                'title' => 'blog_show',
            ],
            [
                'id'    => 52,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 53,
                'title' => 'blog_access',
            ],
            [
                'id'    => 54,
                'title' => 'daftar_layanan_create',
            ],
            [
                'id'    => 55,
                'title' => 'daftar_layanan_edit',
            ],
            [
                'id'    => 56,
                'title' => 'daftar_layanan_show',
            ],
            [
                'id'    => 57,
                'title' => 'daftar_layanan_delete',
            ],
            [
                'id'    => 58,
                'title' => 'daftar_layanan_access',
            ],
            [
                'id'    => 59,
                'title' => 'home_access',
            ],
            [
                'id'    => 60,
                'title' => 'home_create',
            ],
            [
                'id'    => 61,
                'title' => 'home_delete',
            ],
            [
                'id'    => 62,
                'title' => 'home_edit',
            ],
            [
                'id'    => 63,
                'title' => 'home_show',
            ],
            [
                'id'    => 64,
                'title' => 'why_access',
            ],
            [
                'id'    => 65,
                'title' => 'why_create',
            ],
            [
                'id'    => 66,
                'title' => 'why_delete',
            ],
            [
                'id'    => 67,
                'title' => 'why_edit',
            ],
            [
                'id'    => 68,
                'title' => 'why_show',
            ],
            [
                'id'    => 69,
                'title' => 'datachef_access',
            ],
            [
                'id'    => 70,
                'title' => 'datachef_create',
            ],
            [
                'id'    => 71,
                'title' => 'datachef_delete',
            ],
            [
                'id'    => 72,
                'title' => 'datachef_edit',
            ],
            [
                'id'    => 73,
                'title' => 'datachef_show',
            ],
            [
                'id'    => 74,
                'title' => 'signature_access',
            ],
            [
                'id'    => 75,
                'title' => 'signature_create',
            ],
            [
                'id'    => 76,
                'title' => 'signature_delete',
            ],
            [
                'id'    => 77,
                'title' => 'signature_edit',
            ],
            [
                'id'    => 78,
                'title' => 'signature_show',
            ],
            [
                'id'    => 79,
                'title' => 'fn_b_access',
            ],
            [
                'id'    => 80,
                'title' => 'table_create',
            ],
            [
                'id'    => 81,
                'title' => 'table_edit',
            ],
            [
                'id'    => 82,
                'title' => 'table_show',
            ],
            [
                'id'    => 83,
                'title' => 'table_delete',
            ],
            [
                'id'    => 84,
                'title' => 'table_access',
            ],
            [
                'id'    => 85,
                'title' => 'booking_create',
            ],
            [
                'id'    => 86,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 87,
                'title' => 'booking_show',
            ],
            [
                'id'    => 88,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 89,
                'title' => 'booking_access',
            ],
            [
                'id'    => 90,
                'title' => 'price_create',
            ],
            [
                'id'    => 91,
                'title' => 'price_edit',
            ],
            [
                'id'    => 92,
                'title' => 'price_show',
            ],
            [
                'id'    => 93,
                'title' => 'price_delete',
            ],
            [
                'id'    => 94,
                'title' => 'price_access',
            ],
            [
                'id'    => 95,
                'title' => 'product_create',
            ],
            [
                'id'    => 96,
                'title' => 'product_edit',
            ],
            [
                'id'    => 97,
                'title' => 'product_show',
            ],
            [
                'id'    => 98,
                'title' => 'product_delete',
            ],
            [
                'id'    => 99,
                'title' => 'product_access',
            ],
            [
                'id'    => 100,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
