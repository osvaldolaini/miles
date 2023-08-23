<?php

namespace Tests\Feature\Livewire\Homepage;

use App\Http\Livewire\Homepage\PrivacyPolicy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PrivacyPolicyTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PrivacyPolicy::class);

        $component->assertStatus(200);
    }
}
