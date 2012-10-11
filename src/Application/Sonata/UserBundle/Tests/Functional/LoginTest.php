<?php

namespace Application\Sonata\UserBundle\Tests\Functional;

use IC\Bundle\Base\TestBundle\Test\WebTestCase;

class LoginTest extends WebTestCase
{
    /**
     * {@inheritdoc}
     */
    protected static function getFixtureList()
    {
        return array(
            'Application\Sonata\UserBundle\DataFixtures\ORM\LoadUserData',
        );
    }

    public function testLoadingLoginPage()
    {
        $client = $this->getClient();
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/admin/dashboard');

        $this->assertGreaterThan(0, $crawler->filter('html:contains("Username:")')->count());
    }

    public function testLogginIn()
    {
        $client = $this->getClient();
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/admin/dashboard');

        /** @var $super_admin \Application\Sonata\UserBundle\Entity\User */
        $super_admin = $this->getReferenceRepository()->getReference('user.super_admin');

        $data = array(
            '_username' => $super_admin->getUsername(),
            '_password' => 'test',
        );

        $form = $crawler->selectButton('Login')->form();

        $crawler = $client->submit($form, $data);

        $this->assertGreaterThan(0, $crawler->filter('html:contains("Users")')->count());
    }

    public function testNotLoggedInUser()
    {
        $client = $this->getClient();
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/admin/dashboard');

        $data = array(
            '_username' => 'broken',
            '_password' => 'test',
        );

        $form = $crawler->selectButton('Login')->form();

        $crawler = $client->submit($form, $data);

        $this->assertGreaterThan(0, $crawler->filter('html:contains("Bad credentials")')->count());
    }


    public function testNotLoggedInUserCannotAccessDashboard()
    {
        $client = $this->getClient();
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/admin/dashboard');

        $this->assertEquals(0, $crawler->filter('html:contains("Bills")')->count());
    }
}
