<?php

use App\Models\PerjalananDinas;
use App\Repositories\PerjalananDinasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerjalananDinasRepositoryTest extends TestCase
{
    use MakePerjalananDinasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PerjalananDinasRepository
     */
    protected $perjalananDinasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->perjalananDinasRepo = App::make(PerjalananDinasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePerjalananDinas()
    {
        $perjalananDinas = $this->fakePerjalananDinasData();
        $createdPerjalananDinas = $this->perjalananDinasRepo->create($perjalananDinas);
        $createdPerjalananDinas = $createdPerjalananDinas->toArray();
        $this->assertArrayHasKey('id', $createdPerjalananDinas);
        $this->assertNotNull($createdPerjalananDinas['id'], 'Created PerjalananDinas must have id specified');
        $this->assertNotNull(PerjalananDinas::find($createdPerjalananDinas['id']), 'PerjalananDinas with given id must be in DB');
        $this->assertModelData($perjalananDinas, $createdPerjalananDinas);
    }

    /**
     * @test read
     */
    public function testReadPerjalananDinas()
    {
        $perjalananDinas = $this->makePerjalananDinas();
        $dbPerjalananDinas = $this->perjalananDinasRepo->find($perjalananDinas->id);
        $dbPerjalananDinas = $dbPerjalananDinas->toArray();
        $this->assertModelData($perjalananDinas->toArray(), $dbPerjalananDinas);
    }

    /**
     * @test update
     */
    public function testUpdatePerjalananDinas()
    {
        $perjalananDinas = $this->makePerjalananDinas();
        $fakePerjalananDinas = $this->fakePerjalananDinasData();
        $updatedPerjalananDinas = $this->perjalananDinasRepo->update($fakePerjalananDinas, $perjalananDinas->id);
        $this->assertModelData($fakePerjalananDinas, $updatedPerjalananDinas->toArray());
        $dbPerjalananDinas = $this->perjalananDinasRepo->find($perjalananDinas->id);
        $this->assertModelData($fakePerjalananDinas, $dbPerjalananDinas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePerjalananDinas()
    {
        $perjalananDinas = $this->makePerjalananDinas();
        $resp = $this->perjalananDinasRepo->delete($perjalananDinas->id);
        $this->assertTrue($resp);
        $this->assertNull(PerjalananDinas::find($perjalananDinas->id), 'PerjalananDinas should not exist in DB');
    }
}
