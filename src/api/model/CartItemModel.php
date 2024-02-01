<?php

namespace api\model;

/*
  This is the CartItemModel, its main function is to communicate with the database.
*/
class CartItemModel
{
  private const TABLE_NAME = 'cart';
  private const FIELD_ID = 'id';
  private const FIELD_CART_ID = 'cart_id';
  private const FIELD_PRODUCT_ID = 'product_id';
  private const FIELD_AMOUNT = 'amount';

  /** @var int */
  public $id;

  /** @var int */
  public $orderId;

  /** @var string */
  public $session;

  /** @var Database */
  private $db;

  public function __construct($database)
  {
    $this->db = $database;
  }

  public function save(): int
    {
        return $this->db->insert(
            'INSERT INTO ' . self::TABLE_NAME .
                ' (' .
                self::FIELD_ORDER_ID . ', ' .
                self::FIELD_SESSION . ', ' .
                ') VALUES (?, ?)',
            [
                ['is'],
                [
                    $this->orderId,
                    $this->session
                ]
            ]);
    }
}
