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
    $this->click("link=Backlog");
    $this->waitForPageToLoad("30000");
    $this->click("link=Créer une nouvelle US");
    $this->waitForPageToLoad("30000");
    $this->type("id=title", "ModifyTestS");
    $this->type("id=description", "dede");
    $this->verifyText("css=p", "Description : dede");
    $this->select("id=sprint", "label=1");
    $this->type("id=descriptiontest", "d");
    $this->type("id=codetest", "d");
    $this->type("id=linkgit", "d");
    $this->click("id=submit");
    $this->waitForPageToLoad("30000");
    $this->click("link=ModifyTestS");
    $this->waitForPageToLoad("30000");
    $this->click("link=Backlog");
    $this->waitForPageToLoad("30000");
    $this->click("//div[@id='texte']/div/section/div/table/tbody/tr[7]/td[10]/a/span");
    $this->waitForPageToLoad("30000");
    $this->type("id=description", "dedeD");
    $this->click("id=submit");
    $this->waitForPageToLoad("30000");
    $this->click("link=ModifyTestS");
    $this->waitForPageToLoad("30000");
    $this->verifyText("css=p", "Description : dedeD");
  }
}
?>