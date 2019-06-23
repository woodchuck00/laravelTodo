<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todoController extends Controller
{
  public function get()
  {
      return Todo::all();
  }

  public function add(Request $request)
  {
      return Todo::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $task = Todo::findOrFail($id);
    $task->update($request->all());

    return $task;
  }

  public function delete($id)
  {

    $task = Todo::findOrFail($id);
    $task->delete();

    return 204;

  }
}
