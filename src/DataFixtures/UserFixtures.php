<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class TaskFixtures.
 */
class UserFixtures extends Fixture
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
            $task = new User();
            $task->setUserId($this->faker->randomNumber());
            $task->setUsername($this->faker->userName);
            $task->setUserPassword($this->faker->password);
            $task->setUserRole($this->faker->randomElements($array = array ('a','b','c'), $count = 1));
            $this->manager->persist($task);
        }

        $manager->flush();
    }
}