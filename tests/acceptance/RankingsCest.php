<?php 

class RankingsCest
{
    public function rankingsPageWorking(AcceptanceTester $I)
    {
        //login first
        $I->amOnPage('/LoginScreen');
        $I->see('Login', 'body h1');
        $I->fillField('username','ab');
        $I->fillField('password','cd');
        $I->click('Login');


        // Act - request URL '/'
        $I->amOnPage('/HomePage');

        // Assert

        // you may need to change text/case - to match text appearing on _your_ home page :-)
        // we should see this text somewhere in the contents of the Request
        $I->see('Home Page');

        // use CSS selector to specify that it is in an <h1> that we expected to see this text
        $I->see('Home Page', 'body h1');

        //go to rankings
        $I->click('Rankings');
        $I->amOnPage('/DisplayRankings');
        $I->see('Rankings','body h1');
    }


}
