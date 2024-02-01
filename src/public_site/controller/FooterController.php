<?php

namespace public_site\controller;

/*
  This is the FooterController, its main function is to show the Footer.
*/
class FooterController
{
  public function showFooter(): void
  {
    echo "
      <footer>
        <h5>&#169; TAITAJA 2024</h5>
        <p>Mikael Kolehmainen</p>
        <p>Vamia</p>
      </footer>
    ";
  }
}
