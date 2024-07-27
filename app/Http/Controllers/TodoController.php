<?php


namespace App\Http\Controllers;

Use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string'
        ]);
        Todo::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect(route('todos.index'));
    }
    public function edit($id)
    {
        $todo = Todo::findOrFail($id); // Assuming Todo model exists
        return view('todos.edit', compact('todo'));
    }
    public function update(Request $request,Todo $todo){
        //dd($request->all());
        $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',

        ]);


        $completed = $request->has('completed');
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $completed,
        ]);
        return redirect(route('todos.index'));
    }
    public function destroy(Todo $todo){
        $todo->delete();
        return redirect(route('todos.index'));
    }
    //
}
