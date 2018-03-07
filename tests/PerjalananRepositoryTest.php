<?php

use App\Models\Perjalanan;
use App\Repositories\PerjalananRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerjalananRepositoryTest extends TestCase
{
    use MakePerjalananTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PerjalananRepository
     */
    protected $perjalananRepo;

    public function setUp()
    {
        parent::setUp();
        $this->perjalananRepo = App::make(PerjalananRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePerjalanan()
    {
        $perjalanan = $this->fakePerjalananData();
        $createdPerjalanan = $this->perjalananRepo->create($perjalanan);
        $createdPerjalanan = $createdPerjalanan->toArray();
        $this->assertArrayHasKey('id', $createdPerjalanan);
        $this->assertNotNull($createdPerjalanan['id'], 'Created Perjalanan must have id specified');
        $this->assertNotNull(Perjalanan::find($createdPerjalanan['id']), 'Perjalanan with given id must be in DB');
        $this->assertModelData($perjalanan, $createdPerjalanan);
    }

    /**
     * @test read
     */
    public function testReadPerjalanan()
    {
        $perjalanan = $this->makePerjalanan();
        $dbPerjalanan = $this->perjalananRepo->find($perjalanan->id);
        $dbPerjalanan = $dbPerjalanan->toArray();
        $this->assertModelData($perjalanan->toArray(), $dbPerjalanan);
    }

    /**
     * @test update
     */
    public function testUpdatePerjalanan()
    {
        $perjalanan = $this->makePerjalanan();
        $fakePerjalanan = $this->fakePerjalananData();
        $updatedPerjalanan = $this->perjalananRepo->update($fakePerjalanan, $perjalanan->id);
        $this->assertModelData($fakePerjalanan, $updatedPerjalanan->toArray());
        $dbPerjalanan = $this->perjalananRepo->find($perjalanan->id);
        $this->assertModelData($fakePerjalanan, $dbPerjalanan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePerjalanan()
    {
        $perjalanan = $this->makePerjalanan();
        $resp = $this->perjalananRepo->delete($perjalanan->id);
        $this->assertTrue($resp);
        $this->assertNull(Perjalanan::find($perjalanan->id), 'Perjalanan should not exist in DB');
    }
}
