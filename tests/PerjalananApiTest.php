<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerjalananApiTest extends TestCase
{
    use MakePerjalananTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePerjalanan()
    {
        $perjalanan = $this->fakePerjalananData();
        $this->json('POST', '/api/v1/perjalanans', $perjalanan);

        $this->assertApiResponse($perjalanan);
    }

    /**
     * @test
     */
    public function testReadPerjalanan()
    {
        $perjalanan = $this->makePerjalanan();
        $this->json('GET', '/api/v1/perjalanans/'.$perjalanan->id);

        $this->assertApiResponse($perjalanan->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePerjalanan()
    {
        $perjalanan = $this->makePerjalanan();
        $editedPerjalanan = $this->fakePerjalananData();

        $this->json('PUT', '/api/v1/perjalanans/'.$perjalanan->id, $editedPerjalanan);

        $this->assertApiResponse($editedPerjalanan);
    }

    /**
     * @test
     */
    public function testDeletePerjalanan()
    {
        $perjalanan = $this->makePerjalanan();
        $this->json('DELETE', '/api/v1/perjalanans/'.$perjalanan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/perjalanans/'.$perjalanan->id);

        $this->assertResponseStatus(404);
    }
}
