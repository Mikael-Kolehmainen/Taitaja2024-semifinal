<?php

namespace public_site\controller;
use api\manager\ServerRequestManager;

/*
  This is the HomeController, its main function is to show the landing page of
  the website.
*/
class HomeController
{
  public function showHomePage(): void
  {
    $baseUrl = ServerRequestManager::getBaseUrl();

    echo "
        <title>Tuottajamarket - Etusivu</title>
      </head>
    ";

    $this->showHeader();

    echo "
      <section>
        <article class='hero'>
          <h1>Tuoretta lähiruokaa suoraan kotiovellesi!</h1>
          <p>Tuottajamarket - Kaupunkilaisille vaivatonta lähiruoan hankintaa.</p>
          <a href='$baseUrl/index.php/shop' class='cta btn'>Selaa tuotteita</a>
        </article>
        <article class='home'>
          <h1>Kuinka Se Toimii</h1>
          <div class='items'>
            <div class='item'>
              <div class='icon'><i class='fa-pen'></i></div>
              <div class='content'>
                <h2>1. Rekisteröityminen</h2>
                <p>Aloita rekisteröitymällä Tuottajamarket-verkkopalveluun omalla käyttäjätunnuksellasi ja salasanallasi.</p>
              </div>
            </div>
            <div class='item'>
              <div class='icon'><i class='fa-magnifying'></i></div>
              <div class='content'>
                <h2>2. Selaa tuotteita</h2>
                <p>Kirjauduttuasi sisään voit selata monipuolista valikoimaa laadukkaita ja lähellä tuotettuja tuotteita. Käy läpi eri tuotekategorioita ja tutustu tarjontaan.</p>
              </div>
            </div>
            <div class='item'>
              <div class='icon'><i class='fa-plus'></i></div>
              <div class='content'>
                <h2>3. Lisää ostoskoriin</h2>
                <p>Valittuasi haluamasi tuotteet voit lisätä ne ostoskoriin. Voit valita useita tuotteita eri kategorioista.</p>
              </div>
            </div>
            <div class='item'>
              <div class='icon'><i class='fa-smile'></i></div>
              <div class='content'>
                <h2>4. Tarkista ostokset</h2>
                <p>Siirry ostoskoriin ja tarkista valintasi ennen tilauksen vahvistamista. Voit muuttaa määriä tai poistaa tuotteita tarvittaessa.</p>
              </div>
              </div>
            <div class='item'>
              <div class='icon'><i class='fa-thumbs-up'></i></div>
              <div class='content'>
                <h2>5. Tilauksen vahvistus</h2>
                <p>Kun olet tyytyväinen ostoskoriisi, vahvista tilauksesi ja syötä tarvittavat toimitustiedot</p>
              </div>
            </div>
            <div class='item'>
              <div class='icon'><i class='fa-gift'></i></div>
              <div class='content'>
                <h2>6. Toimitus kotiovelle</h2>
                <p>Odota tuotteiden saapumista kotiovellesi. Tuottajamarket-verkkopalvelu toimittaa laadukkaat lähiruokatuotteet vaivattomasti sinulle.</p>
              </div>
            </div>
            <div class='item'>
              <div class='icon'><i class='fa-heart'></i></div>
              <div class='content'>
                <h2>7. Nauti lähiruoasta</h2>
                <p>Saapuneet tuotteet ovat nyt valmiita nautittavaksi. Nauti herkullisista ja laadukkaista lähiruoista omassa arjessasi!</p>
              </div>
            </div>
          </div>
        </article>
      </section>
    ";

    $this->showFooter();
  }

  private function showHeader(): void
  {
    $headerController = new HeaderController();
    $headerController->showHeader();
  }

  private function showFooter(): void
  {
    $footerController = new FooterController();
    $footerController->showFooter();
  }
}
