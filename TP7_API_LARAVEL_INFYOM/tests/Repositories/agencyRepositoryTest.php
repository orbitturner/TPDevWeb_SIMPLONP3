<?php namespace Tests\Repositories;

use App\Models\agency;
use App\Repositories\agencyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class agencyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var agencyRepository
     */
    protected $agencyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->agencyRepo = \App::make(agencyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_agency()
    {
        $agency = factory(agency::class)->make()->toArray();

        $createdagency = $this->agencyRepo->create($agency);

        $createdagency = $createdagency->toArray();
        $this->assertArrayHasKey('id', $createdagency);
        $this->assertNotNull($createdagency['id'], 'Created agency must have id specified');
        $this->assertNotNull(agency::find($createdagency['id']), 'agency with given id must be in DB');
        $this->assertModelData($agency, $createdagency);
    }

    /**
     * @test read
     */
    public function test_read_agency()
    {
        $agency = factory(agency::class)->create();

        $dbagency = $this->agencyRepo->find($agency->id);

        $dbagency = $dbagency->toArray();
        $this->assertModelData($agency->toArray(), $dbagency);
    }

    /**
     * @test update
     */
    public function test_update_agency()
    {
        $agency = factory(agency::class)->create();
        $fakeagency = factory(agency::class)->make()->toArray();

        $updatedagency = $this->agencyRepo->update($fakeagency, $agency->id);

        $this->assertModelData($fakeagency, $updatedagency->toArray());
        $dbagency = $this->agencyRepo->find($agency->id);
        $this->assertModelData($fakeagency, $dbagency->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_agency()
    {
        $agency = factory(agency::class)->create();

        $resp = $this->agencyRepo->delete($agency->id);

        $this->assertTrue($resp);
        $this->assertNull(agency::find($agency->id), 'agency should not exist in DB');
    }
}
