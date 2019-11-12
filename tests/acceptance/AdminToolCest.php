<?php 

class AdminToolCest
{
    public function adminTool(AcceptanceTester $I)
    {
        //not logged in
        $I->amOnPage('/AdminTool');
        $I->see('You must login appropriately to access this page.');

        $I->amOnPage('/AddEvent');
        $I->see('You must login appropriately to access this page.');

        $I->amOnPage('EditEvent');
        $I->see('You must login appropriately to access this page.');

        $I->amOnPage('/DeleteEvent');
        $I->see('You must login appropriately to access this page.');
        
        //logged in
        $I->amOnPage('/LoginScreen');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'admin');
        $I->click('Login');

        $I->amOnPage('/AdminTool');
        $I->see('Admin Tool','body h1');

        $I->amOnPage('/AddEvent');
        $I->see('Add Event', 'body h1');

        $I->amOnPage('EditEvent');
        $I->see('Edit Event', 'body h1');

        $I->amOnPage('/DeleteEvent');
        $I->see('Delete Event','body h1');

        //logged in but not as admin
        $I->amOnPage('/LoginScreen');
        $I->fillField('username', 'ab');
        $I->fillField('password', 'cd');
        $I->click('Login');

        $I->amOnPage('/HomePage');
        $I->see('Home Page','body h1');
        $I->click('Admin Tool');
        $I->amOnPage('/DisplayError');
        $I->see('You must login appropriately to access this page.');
    }
}
