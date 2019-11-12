<?php

class HomePageCest
{
    public function homepageWorking(AcceptanceTester $I)
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

    }
}