<?php

namespace api\model;

/*
  This is the CategoryModel, its main function is to communicate with the database.
*/
class CategoryModel
{
  private const TABLE_NAME = 'categories';
  private const FIELD_ID = 'id';
  private const FIELD_NAME = 'name';

  /** @var int */
  public $id;

  /** @var string */
  public $name;

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

    $categories = [];
    $i = 0;
    foreach ($records as $record) {
      $category = new CategoryModel($this->db);
      $category->mapFromDbRecord($record);
      $categories[$i] = $category;

      $i++;
    }

    return $categories;
  }

 /**
   * @param mixed[] $record Associative array of one db record
   * @return $this
   */
  public function mapFromDbRecord($record)
  {
    $this->id = $record[self::FIELD_ID];
    $this->name = $record[self::FIELD_NAME];

    return $this;
  }
}
