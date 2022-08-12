<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosAppController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        //dd(request()->all());
        /*
        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        */
        $todo = Todo::create($data);
        $todo->save();

        session()->flash('success', 'Todo has created successfuly');

        return redirect('/index');

    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Todo $todo)
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        //dd(request()->all());
        /*
        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save();
        */
        $todo->update($data);

        session()->flash('success', 'Todo has updated successfuly');

        return redirect("/index/{$todo->id}");

    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        session()->flash('success', 'Todo has deleted successfuly');

        return redirect('/index');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Todo has completed successfuly');

        return redirect('/index');
    }

    public function recomplete(Todo $todo)
    {
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Todo has been opened to complete it successfuly');

        return redirect()->back();
    }
}
