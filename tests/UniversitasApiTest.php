<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UniversitasApiTest extends TestCase
{
    use MakeUniversitasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUniversitas()
    {
        $universitas = $this->fakeUniversitasData();
        $this->json('POST', '/api/v1/universitas', $universitas);

        $this->assertApiResponse($universitas);
    }

    /**
     * @test
     */
    public function testReadUniversitas()
    {
        $universitas = $this->makeUniversitas();
        $this->json('GET', '/api/v1/universitas/'.$universitas->id);

        $this->assertApiResponse($universitas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUniversitas()
    {
        $universitas = $this->makeUniversitas();
        $editedUniversitas = $this->fakeUniversitasData();

        $this->json('PUT', '/api/v1/universitas/'.$universitas->id, $editedUniversitas);

        $this->assertApiResponse($editedUniversitas);
    }

    /**
     * @test
     */
    public function testDeleteUniversitas()
    {
        $universitas = $this->makeUniversitas();
        $this->json('DELETE', '/api/v1/universitas/'.$universitas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/universitas/'.$universitas->id);

        $this->assertResponseStatus(404);
    }
}
