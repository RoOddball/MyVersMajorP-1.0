<?php

class DisplaySearchResultCest
{


    public function searchResultWorking(AcceptanceTester $I)
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

        //search result
        $I->fillField('search','daniel cormier');
        $I->click('submit');
        $I->seeInCurrentUrl('/DisplaySearchResult');
        $I->see('Daniel Cormier');
        $I->click('Daniel Cormier');
        $I->seeInCurrentUrl('Fighter','body h1');
    }


}
