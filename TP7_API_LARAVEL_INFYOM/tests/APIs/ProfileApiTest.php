<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Profile;

class ProfileApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_profile()
    {
        $profile = factory(Profile::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/profiles', $profile
        );

        $this->assertApiResponse($profile);
    }

    /**
     * @test
     */
    public function test_read_profile()
    {
        $profile = factory(Profile::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/profiles/'.$profile->id
        );

        $this->assertApiResponse($profile->toArray());
    }

    /**
     * @test
     */
    public function test_update_profile()
    {
        $profile = factory(Profile::class)->create();
        $editedProfile = factory(Profile::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/profiles/'.$profile->id,
            $editedProfile
        );

        $this->assertApiResponse($editedProfile);
    }

    /**
     * @test
     */
    public function test_delete_profile()
    {
        $profile = factory(Profile::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/profiles/'.$profile->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/profiles/'.$profile->id
        );

        $this->response->assertStatus(404);
    }
}
