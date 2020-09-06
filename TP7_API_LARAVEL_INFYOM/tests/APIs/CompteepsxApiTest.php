<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Compteepsx;

class CompteepsxApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_compteepsx()
    {
        $compteepsx = factory(Compteepsx::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/compteepsxes', $compteepsx
        );

        $this->assertApiResponse($compteepsx);
    }

    /**
     * @test
     */
    public function test_read_compteepsx()
    {
        $compteepsx = factory(Compteepsx::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/compteepsxes/'.$compteepsx->id
        );

        $this->assertApiResponse($compteepsx->toArray());
    }

    /**
     * @test
     */
    public function test_update_compteepsx()
    {
        $compteepsx = factory(Compteepsx::class)->create();
        $editedCompteepsx = factory(Compteepsx::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/compteepsxes/'.$compteepsx->id,
            $editedCompteepsx
        );

        $this->assertApiResponse($editedCompteepsx);
    }

    /**
     * @test
     */
    public function test_delete_compteepsx()
    {
        $compteepsx = factory(Compteepsx::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/compteepsxes/'.$compteepsx->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/compteepsxes/'.$compteepsx->id
        );

        $this->response->assertStatus(404);
    }
}
