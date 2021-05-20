<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class TaskFixtures.
 */
class ImageFixtures extends Fixture
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
            $task = new Image();
            $task->setImageId($this->faker->randomNumber());
            $task->setImageName($this->faker->word);
            $task->setImageDesc($this->faker->sentence);
            $task->setImageWidth($this->faker->randomNumber());
            $task->setImageHeight($this->faker->randomNumber());
            $task->setAlbumId($this->faker->randomNumber());
            $task->setUserId($this->faker->randomNumber());
            $task->setImageTimeCreate($this->faker->dateTimeBetween('-100 days', '-1 days'));
            $task->setTypeId($this->faker->randomNumber());
            $task->setImageCol($this->faker->word);
            $this->manager->persist($task);
        }

        $manager->flush();
    }
}