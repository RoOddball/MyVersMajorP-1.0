<?php 

class FighterInfoCest
{
    public function rankingsPageWorking(AcceptanceTester $I)
    {
        //login first
        $I->amOnPage('/LoginScreen');
        $I->see('Login', 'body h1');
        $I->fillField('username','ab');
        $I->fillField('password','cd');
        $I->click('Login');


        //go to homepage
        $I->amOnPage('/HomePage');


        $I->see('Home Page');

        $I->see('Home Page', 'body h1');

        //select fighter through rankings
        $I->click('Rankings');
        $I->amOnPage('/DisplayRankings');
        $I->see('Rankings','body h1');
        $I->click('Daniel Cormier');
        $I->see('Fighter','body h1');

        //select fighter through fight card
        $I->amOnPage('/HomePage');
        $I->click('Archive');
        $I->click('UFC 236: Holloway vs. Poirier');
        $I->click('Max Holloway');
        $I->see('Fighter','body h1');
    }
}
