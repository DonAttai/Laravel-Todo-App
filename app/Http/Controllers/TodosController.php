<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;


class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }


    public function create()
    {
        return view('/todos');
    }

    public function store()
    {
        // $todo = new Todo();
        // $todo->title = request('title');
        // $todo->save();

        // Todo::create($this->validatedData());
        $todos = Auth()->user()->todos()->create($this->validatedData());
        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Todo $todo)
    {
        // $data = request()->validate([
        //     'title' => 'required',
        // ]);

        $todo->update($this->validatedData());
        return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/todos');
    }

    protected function validatedData()
    {
        return request()->validate([
            'title' => 'required',
        ]);
    }
}
