<?php

namespace public_site\controller;
use api\manager\ServerRequestManager;

/*
  This is the ShopController, its main function is to show the webshop of
  the website.
*/
class ShopController
{
  public function showShopPage(): void
  {
    $baseUrl = ServerRequestManager::getBaseUrl();

    echo "
        <script src='$baseUrl/src/public_site/js/shop-filtering.js' defer></script>
        <script src='$baseUrl/src/public_site/js/mobile-category-view.js' defer></script>
        <title>Tuottajamarket - Verkkokauppa</title>
      </head>
    ";

    $this->showHeader();

    echo "
      <section class='shop'>
        <h1>Verkkokauppa</h1>
        <div class='search-bar'>
          <div class='icon'>
            <i class='fa-magnifying'></i>
          </div>
          <input type='text' placeholder='Etsi tuotteita' name='search'>
        </div>
        <!-- <div class='mobile'>
          <p id='open-category-viewer'>Suodata kategorian mukaan <i class='fa-arrows'></i></p>
        </div> --!>
        <div class='filter desktop'>
          <input type='checkbox' name='all'>
          <label for='all'>Kaikki</label>
        </div>
        <div class='filters'>
      ";


    // Fetches all categories from database.
    $categoryController = new CategoryController();
    $categories = $categoryController->getAllCategories();

    foreach ($categories as $category) {
      echo "
        <div class='filter desktop'>
          <input type='checkbox' class='category' id='category-$category->id' name='category-$category->id''>
          <label for='category-$category->id'>$category->name</label>
        </div>
      ";
    }

    /* echo "
      <div class='mobile category-view'>
        <p id='open-category-viewer'> <i class='fa-back-arrows'></i> Takaisin kaupaan</p>";

      foreach ($categories as $category) {
        echo "
          <div class='filter mobile'>
            <input type='checkbox' class='category' id='category-$category->id' name='category-$category->id''>
            <label for='category-$category->id'>$category->name</label>
          </div>
        ";
      }

    echo "
      </div>
    "; */

    $productController = new ProductController();
    $productAmount = $productController->getAmountOfProducts();

    echo "
          </div>
        </div>
        <h3 class='amount' id='amount-of-shown-products'>Yhteensä $productAmount tuotetta</h3>
        <div class='products'>";


    // Fetches all products from database.
    $products = $productController->getAllProducts();

    foreach ($products as $product) {
      echo "
        <div class='product $product->categoryId'>
          <h3>$product->name</h3>
          <h4>$product->category</h4>
          <p class='description'>$product->description</p>
          <div class='bottom'>
            <div class='price'>
              <p>$product->prize €</p>
            </div>
            <a href='$baseUrl/index.php/add-to-cart/$product->id' class='btn'>
              <p>Osta</p>
            </a>
          </div>
        </div>
        ";
    }

    echo "
      </section>
    ";

    $this->showFooter();
  }

  private function showHeader(): void
  {
    $headerController = new HeaderController();
    $headerController->showShopHeader();
  }

  private function showFooter(): void
  {
    $footerController = new FooterController();
    $footerController->showFooter();
  }
}
