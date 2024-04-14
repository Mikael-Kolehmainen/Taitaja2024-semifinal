<?php
/*
  In this file, we save all the global variables, most often database configurations
  and names which can't be stored inside the classes for whatever reason.

  When we save names and specific strings as variables we can avoid the annoyance
  of writing a name wrong and then spend time trying to find that typo.
*/

const DB_HOST = "localhost";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_DATABASE_NAME = "taitaja_2776";

/*
  Preferably we want the (index.php) to be on the root of the web server,
  but that's not always possible so we need to change this variable based on how
  many directories we're from the root.
*/
const DIRECTORIES_FROM_ROOT = 0;
