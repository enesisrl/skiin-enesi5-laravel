<?php

namespace App\Console\Commands\Utility;

use Illuminate\Support\Facades\DB;
use Master\Foundation\Modules\Commands\Command;
use Master\Modules\AdminModulePermissions\Models\AdminModulePermission;
use Master\Modules\AdminModules\Models\AdminModule;
use Master\Modules\Roles\Models\Role;
use Ramsey\Uuid\Uuid;

class genera_tabella_permessi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'utility:genera-tabella-permessi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // Pulizia tabelle
        DB::table('model_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('permissions')->delete();
        DB::table('role_has_permissions')->delete();

        $roles = Role::all();
        $admin_modules = AdminModule::all();

        foreach($admin_modules as $admin_module){

            $module = $admin_module->description;

            $id_create = Uuid::uuid4()->toString();
            $id_read = Uuid::uuid4()->toString();
            $id_update = Uuid::uuid4()->toString();
            $id_destroy = Uuid::uuid4()->toString();
            DB::table('permissions')->insert([
                [
                    'id' =>  $id_create,
                    'name' => "{$module}Module.create",
                    'guard_name' => 'web'
                ],
                [
                    'id' =>  $id_read,
                    'name' => "{$module}Module.read",
                    'guard_name' => 'web'
                ],
                [
                    'id' =>  $id_update,
                    'name' => "{$module}Module.update",
                    'guard_name' => 'web'
                ],
                [
                    'id' =>  $id_destroy,
                    'name' => "{$module}Module.destroy",
                    'guard_name' => 'web'
                ]
            ]);

            foreach($roles as $role){

                DB::table('role_has_permissions')->insert([['permission_id' => $id_create, 'role_id' =>  $role->id]]);
                DB::table('role_has_permissions')->insert([['permission_id' => $id_read, 'role_id' =>  $role->id]]);
                DB::table('role_has_permissions')->insert([['permission_id' => $id_update, 'role_id' =>  $role->id]]);
                DB::table('role_has_permissions')->insert([['permission_id' => $id_destroy, 'role_id' =>  $role->id]]);

                AdminModulePermission::create(["admin_module_id"=>$admin_module->id,"role_id"=>$role->id,"permission_create"=>1,"permission_read"=>1,"permission_update"=>1,"permission_destroy"=>1]);

            }

        }

        return 0;
    }
}
