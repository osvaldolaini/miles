<?php

namespace Tests\Feature\Livewire\Homepage;

use App\Http\Livewire\Homepage\TermsOfUse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TermsOfUseTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(TermsOfUse::class);

        $component->assertStatus(200);
    }
}
