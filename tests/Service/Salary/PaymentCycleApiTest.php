<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PaymentCycleApiTest extends WebTestCase
{
    public function testCycles(): void
    {
        $thisYear = date("Y");
        $client = static::createClient();
        $cyclesRequest = $client->request('GET', '/api/payment/cycles');
        $this->assertResponseIsSuccessful();
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "We are expecting status code 200");
        $this->assertIsArray(json_decode($client->getResponse()->getContent()), "Array with 5 years should be returned");
        $this->assertStringContainsString( $thisYear, $client->getResponse()->getContent() , "This year should be returned in response");
    }

    public function testThisYear(): void
    {
        $thisYear = date("Y");
        $client = static::createClient();
        $cyclesRequest = $client->request('GET', "api/payment/cycle/$thisYear");
        $this->assertResponseIsSuccessful();
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), 'We are expecting status code 200');
        $this->assertCount(12, json_decode($client->getResponse()->getContent()), 'Array should contain 12 values');
        $this->assertStringContainsString( $thisYear, $client->getResponse()->getContent() , 'This year should be returned in response');
    }
}
