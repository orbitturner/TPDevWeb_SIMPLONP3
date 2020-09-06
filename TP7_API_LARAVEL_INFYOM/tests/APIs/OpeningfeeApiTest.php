<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Openingfee;

class OpeningfeeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_openingfee()
    {
        $openingfee = factory(Openingfee::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/openingfees', $openingfee
        );

        $this->assertApiResponse($openingfee);
    }

    /**
     * @test
     */
    public function test_read_openingfee()
    {
        $openingfee = factory(Openingfee::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/openingfees/'.$openingfee->id
        );

        $this->assertApiResponse($openingfee->toArray());
    }

    /**
     * @test
     */
    public function test_update_openingfee()
    {
        $openingfee = factory(Openingfee::class)->create();
        $editedOpeningfee = factory(Openingfee::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/openingfees/'.$openingfee->id,
            $editedOpeningfee
        );

        $this->assertApiResponse($editedOpeningfee);
    }

    /**
     * @test
     */
    public function test_delete_openingfee()
    {
        $openingfee = factory(Openingfee::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/openingfees/'.$openingfee->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/openingfees/'.$openingfee->id
        );

        $this->response->assertStatus(404);
    }
}
