<?php
/**
 * Category fixture.
 */

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

/**
 * Class CategoryFixtures.
 */
class UserFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'userData', function ($i) {
            $category = new User();
            $category->setUserId($this->faker->randomNumber());
            $category->setUsername($this->faker->userName);
            $category->setUserPassword($this->faker->password);
            $category->setUserRole($this->faker->randomElements($array = array ('a','b','c'), $count = 1));


            return $category;
        });

        $manager->flush();
    }
}