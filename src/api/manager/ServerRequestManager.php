<?php

namespace api\manager;

/*
  This is the ServerRequestManager which serves function that use $_SERVER, $_POST,
  $_GET, etc. constants. For example isPost() which returns a true/false depending
  on if the REQUEST_METHOD is POST or not.
*/
class ServerRequestManager
{
  private const REQUEST_METHOD = "REQUEST_METHOD";
  private const POST = "POST";
  private const GET = "GET";
  private const REQUEST_URI = "REQUEST_URI";

  public static function isPost(): bool
  {
    return $_SERVER[self::REQUEST_METHOD] == self::POST;
  }

  public static function isGet(): bool
  {
    return $_SERVER[self::REQUEST_METHOD] == self::GET;
  }

  public static function getBaseUrl($directoriesFromRoot): string
  {
    $uri = ServerRequestManager::getUriParts();
    if ($directoriesFromRoot > 0) {
      return $uri[0] . "/" . $uri[1] . "/" . $uri[2];
    }
    return "";
  }

  /**
   * @return array<string>|bool
   */
  public static function getUriParts()
  {
    $uri = parse_url($_SERVER[self::REQUEST_URI], PHP_URL_PATH);
    return explode('/', $uri);
  }
}
