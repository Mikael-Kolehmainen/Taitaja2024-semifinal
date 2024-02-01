<?php

namespace public_site\controller;

use api\model\CategoryModel;
use api\model\Database;
use api\model\ProductModel;

/*
  This is the ProductController, its main function is to communicate with the
  ProductModel who communicates with the database.
*/
class ProductController
{
  /** @var int */
  public $id;

  /** @var int */
  public $producerId;

  /** @var int */
  public $categoryId;

  /** @var string */
  public $name;

  /** @var string */
  public $stock;

  /** @var string */
  public $unit;

  /** @var string */
  public $prize;

  /** @var string */
  public $description;

  /** @var Database */
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAmountOfProducts(): int
  {
    return count($this->getAllProducts());
  }

  /** @return ProductModel[] */
  public function getAllProducts()
  {
    $productModel = new ProductModel($this->db);
    $products = $productModel->loadAll();

    $categoryController = new CategoryController();
    foreach ($products as $product)
    {
      $categoryController->id = $product->categoryId;
      $category = $categoryController->getCategory();
      $product->category = $category->name;
    }

    return $products;
  }
}
