<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\UserData;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class TaskFixtures.
 */
class UserDataFixtures extends Fixture
{
    /**
     * Faker.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Persistence object manager.
     *
     * @var \Doctrine\Persistence\ObjectManager
     */
    protected $manager;

    /**
     * Load.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Persistence object manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();
        $this->manager = $manager;

        for ($i = 0; $i < 10; ++$i) {
            $task = new UserData();
            $task->setUserId($this->faker->randomNumber());
            $task->setUserEmail($this->faker->email);
            $task->setUserFirstName($this->faker->firstName('male'|'female'));
            $task->setUserLastName($this->faker->lastName);
            $task->setUserIcon($this->faker->sentence);
            $this->manager->persist($task);
        }

        $manager->flush();
    }
}