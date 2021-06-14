<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionChecker extends Model
{
    public function hasPermission(){
    	if(!isset(auth()->user()->role->permission['name']['user']['can-add'])&&\Route::is('users.index')){
    		return abort(401);
    	}
    }
}
