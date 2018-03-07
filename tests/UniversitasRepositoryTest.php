<?php

use App\Models\Universitas;
use App\Repositories\UniversitasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UniversitasRepositoryTest extends TestCase
{
    use MakeUniversitasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UniversitasRepository
     */
    protected $universitasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->universitasRepo = App::make(UniversitasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUniversitas()
    {
        $universitas = $this->fakeUniversitasData();
        $createdUniversitas = $this->universitasRepo->create($universitas);
        $createdUniversitas = $createdUniversitas->toArray();
        $this->assertArrayHasKey('id', $createdUniversitas);
        $this->assertNotNull($createdUniversitas['id'], 'Created Universitas must have id specified');
        $this->assertNotNull(Universitas::find($createdUniversitas['id']), 'Universitas with given id must be in DB');
        $this->assertModelData($universitas, $createdUniversitas);
    }

    /**
     * @test read
     */
    public function testReadUniversitas()
    {
        $universitas = $this->makeUniversitas();
        $dbUniversitas = $this->universitasRepo->find($universitas->id);
        $dbUniversitas = $dbUniversitas->toArray();
        $this->assertModelData($universitas->toArray(), $dbUniversitas);
    }

    /**
     * @test update
     */
    public function testUpdateUniversitas()
    {
        $universitas = $this->makeUniversitas();
        $fakeUniversitas = $this->fakeUniversitasData();
        $updatedUniversitas = $this->universitasRepo->update($fakeUniversitas, $universitas->id);
        $this->assertModelData($fakeUniversitas, $updatedUniversitas->toArray());
        $dbUniversitas = $this->universitasRepo->find($universitas->id);
        $this->assertModelData($fakeUniversitas, $dbUniversitas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUniversitas()
    {
        $universitas = $this->makeUniversitas();
        $resp = $this->universitasRepo->delete($universitas->id);
        $this->assertTrue($resp);
        $this->assertNull(Universitas::find($universitas->id), 'Universitas should not exist in DB');
    }
}
