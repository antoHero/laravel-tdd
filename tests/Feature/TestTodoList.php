<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TodoList;

class TestTodoList extends TestCase
{
    use RefreshDatabase;

    private $list;

    public function setUp(): void 
    {
        parent::setUp();
        $this->list = TodoList::factory()->create();
    }

    public function test_fetch_todo_list()
    {
        $response = $this->getJson(route('todo-list.fetch'));

        $this->assertEquals(1, count($response->json()));
    }

    public function test_get_single_todo_list()
    {
        $response = $this->getJson(route('todo-list.show', $this->list->id))
                    ->assertOk()
                    ->json();
                    
        $this->assertEquals($response['name'], $this->list->name);
    }
}
