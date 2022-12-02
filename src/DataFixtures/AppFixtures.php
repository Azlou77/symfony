<?php
namespace App\DataFixtures;
use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Bezhanov\Faker\Provider\Commerce;
use Faker\Factory;
use Faker\Generator;
class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private $faker;
    public function __construct()
    {
        $this->faker = Factory::create();
        $this->faker->addProvider(new Commerce($this->faker));
    }
    public function load(ObjectManager $manager)
    {
        $categories = [];
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($this->faker->department);
            $manager->persist($category);
            $categories[] = $category;
        }
        for ($i = 0; $i < 100; $i++) {
            $product = new Product();
            $product->setTitle($this->faker->productName);
            $product->setPrice($this->faker->randomFloat(2, 1, 1000));
            $product->setCategory($categories[array_rand($categories)]);
            $manager->persist($product);
        }
        $manager->flush();
    }
}






