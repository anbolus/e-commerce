<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTest extends WebTestCase
{
    public function testLogin(): void
    {
        $client = static::createClient();
        $userRepository = static::$container->get(UserRepository::class);

        $testUser = $userRepository->findOneByEmail('machin@mail.fr');
        $testUser = $userRepository->findOneByPassword('Password123');

        $client->loginUser($testUser);

        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Login successful !');
    }
}
