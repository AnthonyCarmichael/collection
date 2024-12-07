<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CollectionComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CollectionComponentTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(CollectionComponent::class)
            ->assertStatus(200);
    }
}
