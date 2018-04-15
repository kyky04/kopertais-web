<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerjalananDinasApiTest extends TestCase
{
    use MakePerjalananDinasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePerjalananDinas()
    {
        $perjalananDinas = $this->fakePerjalananDinasData();
        $this->json('POST', '/api/v1/perjalananDinas', $perjalananDinas);

        $this->assertApiResponse($perjalananDinas);
    }

    /**
     * @test
     */
    public function testReadPerjalananDinas()
    {
        $perjalananDinas = $this->makePerjalananDinas();
        $this->json('GET', '/api/v1/perjalananDinas/'.$perjalananDinas->id);

        $this->assertApiResponse($perjalananDinas->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePerjalananDinas()
    {
        $perjalananDinas = $this->makePerjalananDinas();
        $editedPerjalananDinas = $this->fakePerjalananDinasData();

        $this->json('PUT', '/api/v1/perjalananDinas/'.$perjalananDinas->id, $editedPerjalananDinas);

        $this->assertApiResponse($editedPerjalananDinas);
    }

    /**
     * @test
     */
    public function testDeletePerjalananDinas()
    {
        $perjalananDinas = $this->makePerjalananDinas();
        $this->json('DELETE', '/api/v1/perjalananDinas/'.$perjalananDinas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/perjalananDinas/'.$perjalananDinas->id);

        $this->assertResponseStatus(404);
    }
}
