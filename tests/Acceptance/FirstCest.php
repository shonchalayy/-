<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function productTest(AcceptanceTester $I)
    {
        $I->amOnPage('/products/index.php');
        $I->click('#btn1');
        $I->fillField('#name', value: "Chocolate");
        $I->fillField('#price', value: "100");
        $I->fillField('#article', value: "777c7");
        $I->click('#btn2');
        $I->canSee('Chocolate');
        $I->wait(4);
    }

    public function receptionTest(AcceptanceTester $I)
    {
        $I->amOnPage('/receptions/index.php');
        $I->click('#btn3');
        $I->selectOption('#product', "Chocolate");
        $I->fillField('#date', "11-12-2024");
        $I->fillField('#quantity', value: "234");
        $I->click('#btn4');
        $I->click('#btn5');
        $I->wait(3);
    }
}
