<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class TaskFixtures.
 */
class CommentFixtures extends Fixture
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
            $task = new Comment();
            $task->setCommentId($this->faker->randomNumber());
            $task->setCommentContent($this->faker->sentence);
            $task->setUserId($this->faker->randomNumber());
            $task->setImageId($this->faker->randomNumber());
            $this->manager->persist($task);
        }

        $manager->flush();
    }
}