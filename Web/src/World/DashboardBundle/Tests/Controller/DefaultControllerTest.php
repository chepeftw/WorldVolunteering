<?php

namespace World\DashboardBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $urls = array(
            '/',
            '/associations',
            '/about',
            '/contact',
            '/association/1/yoa',
        );

        foreach( $urls as $url ) {
            $crawler = $client->request( 'GET', $url );

            $this->assertTrue( $client->getResponse()->isSuccessful() );
            $this->assertTrue( $crawler->filter('html:contains("Mint3 Inc")')->count() > 0 );
        }

    }
}
