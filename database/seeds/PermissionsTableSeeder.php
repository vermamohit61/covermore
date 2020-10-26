<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'lead_create',
            ],
            [
                'id'    => '18',
                'title' => 'lead_edit',
            ],
            [
                'id'    => '19',
                'title' => 'lead_show',
            ],
            [
                'id'    => '20',
                'title' => 'lead_delete',
            ],
            [
                'id'    => '21',
                'title' => 'lead_access',
            ],
            [
                'id'    => '22',
                'title' => 'customer_create',
            ],
            [
                'id'    => '23',
                'title' => 'customer_edit',
            ],
            [
                'id'    => '24',
                'title' => 'customer_show',
            ],
            [
                'id'    => '25',
                'title' => 'customer_delete',
            ],
            [
                'id'    => '26',
                'title' => 'customer_access',
            ],
            [
                'id'    => '27',
                'title' => 'crm_access',
            ],
            [
                'id'    => '28',
                'title' => 'document_create',
            ],
            [
                'id'    => '29',
                'title' => 'document_edit',
            ],
            [
                'id'    => '30',
                'title' => 'document_show',
            ],
            [
                'id'    => '31',
                'title' => 'document_delete',
            ],
            [
                'id'    => '32',
                'title' => 'document_access',
            ],
            [
                'id'    => '33',
                'title' => 'provider_create',
            ],
            [
                'id'    => '34',
                'title' => 'provider_edit',
            ],
            [
                'id'    => '35',
                'title' => 'provider_show',
            ],
            [
                'id'    => '36',
                'title' => 'provider_delete',
            ],
            [
                'id'    => '37',
                'title' => 'provider_access',
            ],
            [
                'id'    => '38',
                'title' => 'product_management_access',
            ],
            [
                'id'    => '39',
                'title' => 'product_category_create',
            ],
            [
                'id'    => '40',
                'title' => 'product_category_edit',
            ],
            [
                'id'    => '41',
                'title' => 'product_category_show',
            ],
            [
                'id'    => '42',
                'title' => 'product_category_delete',
            ],
            [
                'id'    => '43',
                'title' => 'product_category_access',
            ],
            [
                'id'    => '44',
                'title' => 'product_tag_create',
            ],
            [
                'id'    => '45',
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => '46',
                'title' => 'product_tag_show',
            ],
            [
                'id'    => '47',
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => '48',
                'title' => 'product_tag_access',
            ],
            [
                'id'    => '49',
                'title' => 'product_create',
            ],
            [
                'id'    => '50',
                'title' => 'product_edit',
            ],
            [
                'id'    => '51',
                'title' => 'product_show',
            ],
            [
                'id'    => '52',
                'title' => 'product_delete',
            ],
            [
                'id'    => '53',
                'title' => 'product_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
