<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductFilterType;
use App\Repository\ArticleRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/')]
class ContentController extends AbstractController
{
    // Articles
    #[Route('', name: 'app_home')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findByCreatedDate(3);

        return $this->render('content/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    
    // Display all Products
    #[Route('/products', name: 'app_products')]
    public function getProducts(ProductRepository $productRepository): Response
    {
       
        $products = $productRepository->findALL();
        return $this->render('content/products.html.twig', [
            'products' => $products,
        ]);
    }

     
    // Display by Seller
    #[Route('/products/{seller}', name: 'app_products_seller')]
    public function seller(ProductRepository $productRepository, $seller): Response
    {
        $products = $productRepository->findByCreatedDate(5);
        return $this->render('content/products.html.twig', [
            'products' => $products,
        ]);
    }
 
 
    #[Route('/product/{id}', name: 'app_product_show')]
    public function getProduct(Product $product): Response
    {
        return $this->render('content/product.html.twig', [
            'product' => $product,
        ]);
    }

}


