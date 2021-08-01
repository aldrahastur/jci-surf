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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 24,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 25,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 26,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 27,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 28,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 29,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 30,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 31,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 32,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 33,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 34,
                'title' => 'task_create',
            ],
            [
                'id'    => 35,
                'title' => 'task_edit',
            ],
            [
                'id'    => 36,
                'title' => 'task_show',
            ],
            [
                'id'    => 37,
                'title' => 'task_delete',
            ],
            [
                'id'    => 38,
                'title' => 'task_access',
            ],
            [
                'id'    => 39,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 40,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 41,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 42,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 43,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 44,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 45,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 46,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 47,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 48,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 49,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 50,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 51,
                'title' => 'category_create',
            ],
            [
                'id'    => 52,
                'title' => 'category_edit',
            ],
            [
                'id'    => 53,
                'title' => 'category_show',
            ],
            [
                'id'    => 54,
                'title' => 'category_delete',
            ],
            [
                'id'    => 55,
                'title' => 'category_access',
            ],
            [
                'id'    => 56,
                'title' => 'location_create',
            ],
            [
                'id'    => 57,
                'title' => 'location_edit',
            ],
            [
                'id'    => 58,
                'title' => 'location_show',
            ],
            [
                'id'    => 59,
                'title' => 'location_delete',
            ],
            [
                'id'    => 60,
                'title' => 'location_access',
            ],
            [
                'id'    => 61,
                'title' => 'tag_create',
            ],
            [
                'id'    => 62,
                'title' => 'tag_edit',
            ],
            [
                'id'    => 63,
                'title' => 'tag_show',
            ],
            [
                'id'    => 64,
                'title' => 'tag_delete',
            ],
            [
                'id'    => 65,
                'title' => 'tag_access',
            ],
            [
                'id'    => 66,
                'title' => 'directory_access',
            ],
            [
                'id'    => 67,
                'title' => 'listing_create',
            ],
            [
                'id'    => 68,
                'title' => 'listing_edit',
            ],
            [
                'id'    => 69,
                'title' => 'listing_show',
            ],
            [
                'id'    => 70,
                'title' => 'listing_delete',
            ],
            [
                'id'    => 71,
                'title' => 'listing_access',
            ],
            [
                'id'    => 72,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
