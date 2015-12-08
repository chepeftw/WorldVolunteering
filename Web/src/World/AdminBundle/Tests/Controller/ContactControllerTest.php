<?php

namespace World\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{

    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/contact');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /contact/");

//        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Send')->form(array(
            'world_adminbundle_contact[firstName]'  => 'Test First Name',
            'world_adminbundle_contact[lastName]'  => 'Test Last Name',
            'world_adminbundle_contact[email]'  => 'test@test.com',
            'world_adminbundle_contact[phone]'  => '87654321',
            'world_adminbundle_contact[comment]'  => 'Hola bla bla',
            'recaptcha_response_field'  => '1234',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /contact/");
    }

}
