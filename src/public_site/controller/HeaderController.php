<?php

namespace public_site\controller;
use api\manager\ServerRequestManager;

/*
  This is the HeaderControlelr, its main function is to show the Header.
*/
class HeaderController
{
  public function showHeader(): void
  {
    $baseUrl = ServerRequestManager::getBaseUrl();

    echo "
      <script src='$baseUrl/src/public_site/js/session.js' defer></script>
      <header>
        <a href='$baseUrl/index.php'><img src='$baseUrl/src/public_site/media/alt_logo.png' alt='Tuottajamarket logo'></a>
        <nav>
          <a class='btn with-icon' href='$baseUrl/index.php/shop' id='store-link'>Kauppaan <i class='fa-arrows'></i></a>
        </nav>
      </header>
    ";
  }

  public function showShopHeader(): void
  {
    $baseUrl = ServerRequestManager::getBaseUrl();

    echo "
      <header>
        <a href='$baseUrl/index.php'><img src='$baseUrl/src/public_site/media/alt_logo.png' alt='Tuottajamarket logo'></a>
        <nav>
          <a href='$baseUrl/index.php/cart' class='icon'>
            <i class='fa-shopping-cart'></i>
          </a>
          <a href='$baseUrl/index.php' class='link'>Etusivu</a>
        </nav>
      </header>
    ";
  }
}
