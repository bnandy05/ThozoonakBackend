<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\tasks;

class Task extends Controller
{
    public function getTasks()
    {
        $tasks = tasks::all();
        return response()->json(['tasks' => $tasks], 200);
    }

    public function uploadTask(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'string|max:1000|nullable',
            'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])],
        ]);

        $task = new tasks();
        $task->title = $request->input('title');
        $task->description = $request->input('description', null);
        $task->status = $request->input('status');

        $task->save();

        return response()->json(['message' => "Sikeresen feltöltve!"], 200);
    }

    public function modifyTask(Request $request, $id)
    {

        $tasks = tasks::find($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'string|max:1000',
            'status' => [Rule::in(['pending', 'in_progress', 'completed'])],
        ]);

        $tasks->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);


        return response()->json(['message' => "Sikeresen módosítva!"], 200);
    }

    public function deleteTask(Request $request, $id)
    {

        $tasks = tasks::find($id);

        if($tasks)
        {
            $tasks->delete();
            return response()->json(['message' => "Sikeresen törölve!"], 200);
        }

        return response()->json(['message' => "Nem létezik!"], 404);
    }
    
}
