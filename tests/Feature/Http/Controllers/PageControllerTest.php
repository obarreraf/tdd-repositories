<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Repository;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_home()
    {
        $this->withoutExceptionHandling(); #oculta la excepción del test

        $repository = Repository::factory()->create();

        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee($repository->url);
    }
}
