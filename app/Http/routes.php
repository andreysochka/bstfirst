<?php

use App\Task;
use App\News;
use Illuminate\Http\Request;

/**
 * отображение всех задач
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
/**
 * отображение шаблона изменения задачи
 */
Route::get('/tasks/{task}/edit', function (Task $task){
return view('tasks.edit',['task'=>$task]);
}
    );
/**
 * сохранение изменений , запись в базу данніх
 */    
Route::put('/tasks/{task}/edit', function (Task $task, Request $request){
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
/**
 * отобразить все новости
 */
Route::get('/news', function(){
    $news = News::all();
    return view('/news',[
	'news'=>$news
    ]);
});

/**
 * добавить новость
 */

Route::post('/news', function (Request $request) {
    //проверка данных
    $validator = Validator::make($request->all(), [
		'description' => 'required|min:5|max:255'
    ]);

    if ($validator->fails()) {
	return redirect('/news')
			->withInput()
			->withErrors($validator);
    }
      $news=new News();
      $news->description=$request->description;
      $news->save();
      return redirect('/news');
});
/**
 * Удалить новость
 */
Route::delete('/news/{new}', function (News $new) {
    $new->delete();
    return redirect('/news');
});
/**
 * отображение шаблона изменения задачи
 */
Route::get('/news/{new}/edit', function (News $new){
return view('news.edit',['new'=>$new]);
}
    );
/**
 * сохранение изменений , запись в базу данніх
 */    
Route::put('/news/{new}/edit', function (News $new, Request $req){
$validator = Validator::make($req->all(), [
		'description' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
	return redirect('/news/edit/'.$new->id)
			->withInput()
			->withErrors($validator);
    }
      $new->description=$req->description;
      $new->save();
      return redirect('/news');
}
    );