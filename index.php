<?php

use public_site\controller\CartController;
use public_site\controller\ErrorController;
use public_site\controller\HomeController;
use api\manager\ServerRequestManager;
use public_site\controller\ShopController;

require __DIR__ . "/src/inc/bootstrap.php";

session_start();

error_reporting(E_ERROR | E_PARSE);

/*
  Preferably we want this file (index.php) to be on the root of the web server,
  but that's not always possible so we need to change this variable based on how
  many directories we're from the root.
*/
$directoriesFromRoot = 2;

/*
  We need to fetch the baseUrl because we don't know if index.php is in the root
  of the web server, the baseUrl which will be appended to links
*/
$baseUrl = ServerRequestManager::getBaseUrl($directoriesFromRoot);
$uri = ServerRequestManager::getUriParts();
$uri = array_splice($uri, $directoriesFromRoot);

/*
  We want to have a clean file if we're doing an AJAX request from JavaScript
  because otherwise it will throw an error.
*/
if ($uri[2] != "ajax") {

  // These could be considered general configurations that we want on every page.
  echo "
    <!DOCTYPE html>
    <html>
      <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='icon' type='image/x-icon' href='$baseUrl/src/public_site/media/icons/favicon.svg'>
        <link href='$baseUrl/src/public_site/styles/root-variables.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/main.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/icons.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/header.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/footer.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/hero.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/home.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/shop.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/cart.css' rel='stylesheet' type='text/css'>
        <link href='$baseUrl/src/public_site/styles/media-queries.css' rel='stylesheet' type='text/css'>
      ";
}

// We can determine which page to show from the url like this: index.php/$uri[2].
switch ($uri[2]) {
  /*
    We call a function that is defind below depending on how the url looks,
    then the function will call a controller for that specific page and show
    the page from there.
  */
  case "":
    showHome();
    break;
  case "shop":
    showShop();
    break;
  case "cart":
    showCart();
    break;
  case "add-to-cart":
    addToCart();
    break;
  case "error":
    showError("Error title", "This is the error page.", "$baseUrl/index.php");
    break;
  default:
    showError(
      "404 Not Found",
      "The page you're looking for doesn't exist.",
      "$baseUrl/index.php"
    );
    exit();
}

if ($uri[2] != "ajax") {
  echo "
      </body>
    </html>
  ";
}

/* THE FUNCTIONS */

function showHome(): void
{
  $homeController = new HomeController();
  $homeController->showHomePage();
}

function showShop(): void
{
  $shopController = new ShopController();
  $shopController->showShopPage();
}

function showCart(): void
{
  $cartController = new CartController();
  $cartController->showCartPage();
}

function addToCart(): void
{
  $cartController = new CartController();
  $cartController->addToCart();
}

/**
 * @param string $title
 * @param string $message
 * @param string $link
 */
function showError($title, $message, $link): void
{
  $errorController = new ErrorController($title, $message, $link);
  $errorController->showErrorPage();
}
