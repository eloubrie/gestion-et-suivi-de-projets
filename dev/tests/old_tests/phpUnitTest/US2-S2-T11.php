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
    $this->type("id=title", "toto");
    $this->type("id=description", "tata");
    $this->select("id=sprint", "label=1");
    $this->type("id=datebegin", "1992-02-25");
    $this->type("id=dateend", "1992-02-26");
    $this->type("id=descriptiontest", "a test");
    $this->type("id=codetest", "$test = true");
    $this->type("id=linkgit", "https://lol?");
    $this->click("id=submit");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertTrue($this->isElementPresent("link=toto"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->verifyText("//div[@id='texte']/div/section/div/table/tbody/tr[3]/td[4]", "");
    $this->verifyText("//div[@id='texte']/div/section/div/table/tbody/tr[3]/td[6]", "1992-02-25");
    $this->verifyText("//div[@id='texte']/div/section/div/table/tbody/tr[3]/td[7]", "1992-02-26");
    try {
        $this->assertTrue($this->isElementPresent("css=span.afaire"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->verifyText("//div[@id='texte']/div/section/div/table/tbody/tr[3]/td[9]", "0000-00-00");
  }
}
?>