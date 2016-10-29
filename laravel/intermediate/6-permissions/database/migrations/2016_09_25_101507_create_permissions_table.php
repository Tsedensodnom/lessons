<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default(null);
            $table->string('code');
            $table->timestamps();
        });
        
        Schema::create('permissions_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->timestamps();
            $table->unique(['user_id', 'permission_id']);
        });
        
        $permission = new \App\Permission;
        $permission->name = 'Мэдээ нэмэх';
        $permission->code = 'posts.store';
        $permission->save();
        
        $permission = new \App\Permission;
        $permission->name = 'Мэдээ засах';
        $permission->code = 'posts.update';
        $permission->save();
        
        $permission = new \App\Permission;
        $permission->name = 'Мэдэгдэл илгээх';
        $permission->code = 'notifications.send';
        $permission->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_users');
        Schema::dropIfExists('permissions');
    }
}
