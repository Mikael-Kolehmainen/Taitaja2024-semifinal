<?php

namespace api\model;

/*
  This is the ProductModel, its main function is to communicate with the database.
*/
class ProductModel
{
  private const TABLE_NAME = 'products';
  private const FIELD_ID = 'id';
  private const FIELD_PRODUCER_ID = 'producer_id';
  private const FIELD_CATEGORY_ID = 'category_id';
  private const FIELD_NAME = 'name';
  private const FIELD_STOCK = 'stock';
  private const FIELD_UNIT = 'unit';
  private const FIELD_PRIZE ='prize';
  private const FIELD_DESCRIPTION = 'description';

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

  /** @var string */
  public $category;

  /** @var Database */
  private $db;

  public function __construct($database)
  {
    $this->db = $database;
  }

  /** @return $this */
  public function load()
  {
    $records = $this->db->select(
        'SELECT * FROM ' . self::TABLE_NAME . ' WHERE ' . self::FIELD_ID . ' = ?',
        [["s"], [$this->id]]
    );
    $record = array_pop($records);
    return $this->mapFromDbRecord($record);
  }

  public function loadAll()
  {
    $records = $this->db->select(
      'SELECT * FROM ' . self::TABLE_NAME
    );

    $products = [];
    $i = 0;
    foreach ($records as $record) {
      $product = new ProductModel($this->db);
      $product->mapFromDbRecord($record);
      $products[$i] = $product;

      $i++;
    }

    return $products;
  }

  /**
   * @param mixed[] $record Associative array of one db record
   * @return $this
   */
  public function mapFromDbRecord($record)
  {
    $this->id = $record[self::FIELD_ID];
    $this->producerId = $record[self::FIELD_PRODUCER_ID];
    $this->categoryId = $record[self::FIELD_CATEGORY_ID];
    $this->name = $record[self::FIELD_NAME];
    $this->stock = $record[self::FIELD_STOCK];
    $this->unit = $record[self::FIELD_UNIT];
    $this->prize = $record[self::FIELD_PRIZE];
    $this->description = $record[self::FIELD_DESCRIPTION];

    return $this;
  }
}
