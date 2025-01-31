<?php

namespace Tests\Feature\Advertisements;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteAdvertisementsDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Advertisements_Delete_request(): void
    {
        $response = $this->Delete('/');

        $response->assertStatus(200);
    }
}
