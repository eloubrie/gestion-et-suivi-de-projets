<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://localhost/gestion-et-suivi-de-projets/dev/src/index.php");
  }

  public function testMyTestCase()
  {
    $this->open("/gestion-et-suivi-de-projets/dev/src/index.php");
    $this->click("link=Dépôt git");
    $this->waitForPageToLoad("30000");
	$this->click("link=Adresse du dépot Git");
  }
}
?>