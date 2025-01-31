<?php

namespace Tests\Feature\Advertisements;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PutAdvertisementsUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Advertisements_Put_request(): void
    {
        $response = $this->Put('/');

        $response->assertStatus(200);
    }
}
