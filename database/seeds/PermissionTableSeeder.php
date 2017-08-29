<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions=[
            [
               'name'=>'theloai-danhsach',
               'display_name'=>'Hiển thị danh sách thể loại',
               'description'=>'Hiển thị danh sách thể loại'
            ],
            [
               'name'=>'theloai-them',
               'display_name'=>'Thêm mới thể loại',
               'description'=>'Thêm mới thể loại'
            ],
            [
               'name'=>'theloai-sua',
               'display_name'=>'Sửa thể loại',
               'description'=>'Sửa thể loại'
            ],
            [
               'name'=>'theloai-xoa',
               'display_name'=>'Xóa thể loại',
               'description'=>'Xóa thể loại'
            ],

            [
               'name'=>'nhomquantri-danhsach',
               'display_name'=>'Hiển thị danh sách nhóm quản trị',
               'description'=>'Hiển thị danh sách nhóm quản trị'
            ],
            [
               'name'=>'nhomquantri-them',
               'display_name'=>'Thêm mới nhóm quản trị',
               'description'=>'Thêm mới nhóm quản trị'
            ],
            [
               'name'=>'nhomquantri-sua',
               'display_name'=>'Sửa nhóm quản trị',
               'description'=>'Sửa nhóm quản trị'
            ],
            [
               'name'=>'nhomquantri-xoa',
               'display_name'=>'Xóa nhóm quản trị',
               'description'=>'Xóa nhóm quản trị'
            ]
          
        ];
        foreach ($permissions as $key => $value) {
        	# code...
        	Permission::create($value);
        }
    }
}
