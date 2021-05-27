<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\UserData;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TaskFixtures.
 */
class UserDataFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(50, 'tasks', function ($i) {
            $task = new UserData();
            $task->setUserEmail($this->faker->email);
            $task->setUserFirstName($this->faker->firstName('male'|'female'));
            $task->setUserLastName($this->faker->lastName);
            $task->setUserIcon($this->faker->word);
            $task->setUser($this->getRandomReference('userData'));

            return $task;
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}