<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Album;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class TaskFixtures.
 */
class AlbumFixtures extends Fixture
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
            $task = new Album();
            $task->setAlbumId($this->faker->randomNumber());
            $task->setAlbumName($this->faker->sentence);
            $task->setUserId($this->faker->randomNumber());
            $task->setAlbumTimeCreate($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $this->manager->persist($task);
        }

        $manager->flush();
    }
}