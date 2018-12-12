<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{


    public function index() {
    	\Carbon\Carbon::setLocale('vi');

    	$todos = Todo::getAll();
    	return view('todo.index',[
    		'todos' => $todos,
    		'name' => 'Binh'
    	]);
    }

    public function create() {
    	return view('todo.create');
    }

    public function store(Request $request) {

    	if ($request->todo != '') {
    		$todo = Todo::storeData($request->only('todo'));

    		return redirect('/todos')->with('notification', 'Thêm mới thành công');
    	}else {

    		return redirect('/todos')->with('notification-error', 'Bạn không được để trống todo');
    	}
    }

    public function edit($id) {
    	$todo = Todo::find($id);

    	return view('todo.update',[
    		'todo' => $todo
    	]);
    }

    public function destroy($id) {
    	Todo::find($id)->delete();
    	return redirect('/todos')->with('notification', 'Xóa thành công');
    }


    public function update($id,Request $request) {
    	if ($request->todo != '') {
    		$todo = Todo::updateData($id, $request->only('todo'));

    		return redirect('/todos')->with('notification', 'Cập nhật thành công');
    	}else {
    		return redirect()->back()->with([
    			'notification-error' => 'Bạn không được để trống todo',
    			'id' => $request->id
    		]);
    	}
    }
}
