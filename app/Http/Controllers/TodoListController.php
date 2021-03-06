<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index() 
    {
        $lists = TodoList::all();
        return response($lists);
    }

    public function show(TodoList $list)
    {
        return response($list);
    }
}
