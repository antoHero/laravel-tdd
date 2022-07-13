<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TodoList;

class TestTodoList extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_todo_list()
    {
        //prepare
        TodoList::factory()->create();
        
        //perform
        $response = $this->getJson(route('todo-list.fetch'));
        
        //predict
        $this->assertEquals(1, count($response->json()));
    }
}
