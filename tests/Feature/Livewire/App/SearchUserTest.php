<?php

namespace Tests\Feature\Livewire\App;

use App\Http\Livewire\App\SearchUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchUserTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SearchUser::class);

        $component->assertStatus(200);
    }
}
