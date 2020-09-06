<?php namespace Tests\Repositories;

use App\Models\Openingfee;
use App\Repositories\OpeningfeeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OpeningfeeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OpeningfeeRepository
     */
    protected $openingfeeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->openingfeeRepo = \App::make(OpeningfeeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_openingfee()
    {
        $openingfee = factory(Openingfee::class)->make()->toArray();

        $createdOpeningfee = $this->openingfeeRepo->create($openingfee);

        $createdOpeningfee = $createdOpeningfee->toArray();
        $this->assertArrayHasKey('id', $createdOpeningfee);
        $this->assertNotNull($createdOpeningfee['id'], 'Created Openingfee must have id specified');
        $this->assertNotNull(Openingfee::find($createdOpeningfee['id']), 'Openingfee with given id must be in DB');
        $this->assertModelData($openingfee, $createdOpeningfee);
    }

    /**
     * @test read
     */
    public function test_read_openingfee()
    {
        $openingfee = factory(Openingfee::class)->create();

        $dbOpeningfee = $this->openingfeeRepo->find($openingfee->id);

        $dbOpeningfee = $dbOpeningfee->toArray();
        $this->assertModelData($openingfee->toArray(), $dbOpeningfee);
    }

    /**
     * @test update
     */
    public function test_update_openingfee()
    {
        $openingfee = factory(Openingfee::class)->create();
        $fakeOpeningfee = factory(Openingfee::class)->make()->toArray();

        $updatedOpeningfee = $this->openingfeeRepo->update($fakeOpeningfee, $openingfee->id);

        $this->assertModelData($fakeOpeningfee, $updatedOpeningfee->toArray());
        $dbOpeningfee = $this->openingfeeRepo->find($openingfee->id);
        $this->assertModelData($fakeOpeningfee, $dbOpeningfee->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_openingfee()
    {
        $openingfee = factory(Openingfee::class)->create();

        $resp = $this->openingfeeRepo->delete($openingfee->id);

        $this->assertTrue($resp);
        $this->assertNull(Openingfee::find($openingfee->id), 'Openingfee should not exist in DB');
    }
}
