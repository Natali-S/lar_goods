<?php

  use App\Task;
  use Illuminate\Http\Request;

  /**
   * Вывести список всех задач
   */
Route::get('/', function () {
  $tasks = Task::orderBy('created_at', 'asc')->get();

  return view('tasks', [
    'tasks' => $tasks
  ]);
});

  /**
   * Добавить новую задачу
   */
Route::post('/task', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  $task = new Task;
  $task->name = $request->name;
  $task->description = $request->description;
  $task->price = $request->price;
  $task->categories = $request->categories;
  
  $task->save();

  return redirect('/');
});
 /**
   * Изменить существующую задачу
   */
 Route::post('/edit/{id}', function ($id) {
  $task=Task::find($id);
return view('edit', [
    'task' => $task
  ]);
 });
  /**
   * Удалить существующую задачу
   */
 Route::delete('/task/{id}', function ($id) {
  Task::findOrFail($id)->delete();

  return redirect('/');
});