<?php
namespace App\DataFixtures;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\User;
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
        
        $sellers=[];

        for ($i = 0; $i < 10; $i++) {
            $seller = new User();
            $seller->setEmail($this->faker->email);
            $seller->setPassword($this->faker->password);
            $seller->setFirstname($this->faker->firstName);
            $seller->setName($this->faker->lastName);
            $seller->setRoles(['ROLE_SELLER']);
            $manager->persist($seller);
            $sellers[] = $seller;
        }

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
            $product->setPrice($this->faker->randomFloat(2, 1, 2000));
          
            $product->setQuantity($this->faker->randomFloat(2, 1, 10));
            $product->setSeller($sellers[array_rand($sellers)]);
            $product->setCategory($categories[array_rand($categories)]);
            $manager->persist($product);
        }
        $manager->flush();
    }
}






