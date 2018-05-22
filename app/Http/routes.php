<?php

  use App\Task;
  use Illuminate\Http\Request;

  /**
   * Вывести панель с задачами
   */
  Route::get('/', function () {
      return view('tasks');
  });

  /**
   * Добавить новую задачу
   */
  Route::post('/task', function (Request $request) {
      $task=new Task();
      $task->name=$request->name;
      $task->save();
      exit('save');
  });

  /**
   * Удалить задачу
   */
  Route::delete('/task/{task}', function (Task $task) {
    //
  });
