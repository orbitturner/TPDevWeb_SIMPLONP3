<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\State;

class StateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_state()
    {
        $state = factory(State::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/states', $state
        );

        $this->assertApiResponse($state);
    }

    /**
     * @test
     */
    public function test_read_state()
    {
        $state = factory(State::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/states/'.$state->id
        );

        $this->assertApiResponse($state->toArray());
    }

    /**
     * @test
     */
    public function test_update_state()
    {
        $state = factory(State::class)->create();
        $editedState = factory(State::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/states/'.$state->id,
            $editedState
        );

        $this->assertApiResponse($editedState);
    }

    /**
     * @test
     */
    public function test_delete_state()
    {
        $state = factory(State::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/states/'.$state->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/states/'.$state->id
        );

        $this->response->assertStatus(404);
    }
}
