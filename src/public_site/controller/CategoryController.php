<?php

namespace public_site\controller;

use api\model\CategoryModel;
use api\model\Database;

/*
  This is the CategoryController, its main function is to communicate with the
  ProductModel who communicates with the database.
*/
class CategoryController
{
  /** @var int */
  public $id;

  /** @var string */
  public $name;

  /** @var Database */
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  /** @return CategoryModel */
  public function getCategory()
  {
    $categoryModel = new CategoryModel($this->db);
    $categoryModel->id = $this->id;
    return $categoryModel->load();
  }

  /** @return CategoryModel[] */
  public function getAllCategories()
  {
    $categoryModel = new CategoryModel($this->db);
    return $categoryModel->loadAll();
  }
}
