<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * 
 */
Route::get('/', function () {
    //
    $tasks= Task::all();
    return view('tasks',[
	'tasks'=>$tasks
    ]);
});

/**
 * Добавить новую задачу
 */
Route::post('/task', function (Request $request) {
    //проверка данных
    $validator = Validator::make($request->all(), [
		'name' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
	return redirect('/')
			->withInput()
			->withErrors($validator);
    }
      $task=new Task();
      $task->name=$request->name;
      $task->save();
      return redirect('/');
});

/**
 * Удалить задачу
 */
Route::delete('/task/{task}', function (Task $task) {
    //
    $task->delete();
    return redirect('/');
});

Route::get('/tasks/edit/{task}', function (Task $task){
return view('tasks.edit',['task'=>$task]);
  
}
    );
Route::put('/tasks/edit/{task}', function (Task $task, Request $request){
$validator = Validator::make($request->all(), [
		'name' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
	return redirect('/tasks/edit/'.$task->id)
			->withInput()
			->withErrors($validator);
    }
      $task->name=$request->name;
      $task->save();
      return redirect('/');
  
}
    );
    
