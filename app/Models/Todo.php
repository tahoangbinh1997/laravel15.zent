<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos'; // khai báo khi tên bảng không phải là chuẩn

    public static function getAll() {
    	return self::orderBy('id', 'desc')->paginate(env('PAGE',9));
    }

    public static function storeData($data) {
    	$todo = new Todo;
    	$todo->todo = $data['todo'];
    	$todo->save();

    	return $todo;
    }

    public static function updateData($id, $data) {
    	$todo = Todo::find($id);
    	$todo->todo = $data['todo'];
    	$todo->save();

    	return $todo;
    }
}
