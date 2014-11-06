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
    $this->open("/gestion-et-suivi-de-projets/dev/src/us.php?ID=34");
    $this->click("link=Backlog");
    $this->waitForPageToLoad("30000");
    $this->click("link=Créer une nouvelle US");
    $this->waitForPageToLoad("30000");
    $this->type("id=title", "TestTest");
    $this->type("id=description", "a test");
    $this->select("id=sprint", "label=1");
    $this->type("id=descriptiontest", "Test description");
    $this->type("id=codetest", "$test = true");
    $this->click("id=submit");
    $this->waitForPageToLoad("30000");
    $this->click("link=TestTest");
    $this->waitForPageToLoad("30000");
    $this->verifyText("//div[@id='texte']/p[8]", "Description du test : Test description");
    $this->click("link=Backlog");
    $this->waitForPageToLoad("30000");
    $this->click("//div[@id='texte']/div/section/div/table/tbody/tr[4]/td[10]/a/span");
    $this->waitForPageToLoad("30000");
    $this->type("id=descriptiontest", "Test description v2");
    $this->type("id=codetest", "$test = false");
    $this->click("id=submit");
    $this->waitForPageToLoad("30000");
    $this->click("link=TestTest");
    $this->waitForPageToLoad("30000");
    $this->verifyText("//div[@id='texte']/p[8]", "Description du test : Test description v2");
  }
}
?>