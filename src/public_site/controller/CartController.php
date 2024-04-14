<?php

namespace public_site\controller;
use api\manager\ServerRequestManager;
use api\model\CartItemModel;

/*
  This is the CartController, its main function is to show the webshop of
  the website.
*/
class CartController
{
  public function showCartPage(): void
  {
    $baseUrl = ServerRequestManager::getBaseUrl();

    echo "
        <title>Tuottajamarket - Ostoskori</title>
      </head>
    ";

    $this->showHeader();

    echo "
      <section class='cart'>
        <h1>Ostoskori</h1>
        <p>Pahoittelemme, mutta ostoskorisi on tällä hetkellä tyhjä.</p>
        <p>Jatka ostosten tekemistä lisätäksesi tuotteita ostoskoriisi</p>
        <a href='$baseUrl/index.php/shop' class='btn'>
          <i class='fa-arrows-left'></i>
          Selaa ilmoituksia
        </a>
      </section>
    ";

    // content
    /* echo "
      <section>
        <h1>Ostoskori</h1>
        <div class='shopping-cart'>
          <div class='cart-content'>

          </div>
          <div class='customer-form'>
            <form>
              <input type='text' placeholder='Nimi' name='name' required>
              <input type='email' placeholder='Sähköpostiosoite' name='email' required>
              <input type='tel' placeholder='Puhelinnumero' name='phone-number' required>
            </form>
          </div>
        </div>
      </section>
    "; */

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

  public function addToCart(): void
  {
    $uri = ServerRequestManager::getUriParts();
    $uri = array_splice($uri, 2);

    // Will throw an error if productId doesn't exist in url
    $productId = $uri[3];

/*     $cartItemModel = new CartItemModel($this->db); */
  }
}
