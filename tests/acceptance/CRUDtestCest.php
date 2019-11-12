<?php 

class CRUDtestCest
{
    public function testInitialEventsInDatabaseAsExpected(AcceptanceTester $I)
    {
        $I->seeNumRecords(4, 'event');  //executed on db_books database

    }
    public function crudTest(AcceptanceTester $I)
    {
        //creating
        $I->amOnPage('/LoginScreen');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'admin');
        $I->click('Login');
        $I->amOnPage('/AdminTool');
        $I->see('Admin tool', 'body h1');

        $I->click('Add Event');


        $I->fillField('eventName', 'test');
        $I->fillField('fight', 'test');
        $I->fillField('date', '2019-04-20');
        $I->fillField('HasTakenPlace', 'false');
        $I->click('Add');
        $I->seeNumRecords(5, 'event');

        //reading
        $I->amOnPage('/LoginScreen');
        $I->fillField('username', 'ab');
        $I->fillField('password', 'cd');
        $I->click('Login');

        $I->amOnPage('/HomePage');
        $I->fillField('search','daniel cormier');
        $I->click('submit');
        $I->seeInCurrentUrl('/DisplaySearchResult');
        $I->see('Daniel Cormier');
        $I->click('Daniel Cormier');
        $I->seeInCurrentUrl('Fighter','body h1');
        $I->seeInDatabase('fighter', ['name' => 'Daniel Cormier']);

        //updating
        $I->amOnPage('/LoginScreen');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'admin');
        $I->click('Login');

        $I->amOnPage('/AdminTool');
        $I->see('Admin tool', 'body h1');

        $I->click('Edit Event');


        $I->fillField('eventName', 'test');
        $I->fillField('updateSet', 'eventName');
        $I->fillField('Value', 'testingChange');
        $I->click('Edit');
        $I->seeInDatabase('event', ['eventName' => 'testingChange']);

        //deleting
        $I->amOnPage('/LoginScreen');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'admin');
        $I->click('Login');

        $I->amOnPage('/AdminTool');
        $I->see('Admin tool', 'body h1');

        $I->click('Delete Event');


        $I->fillField('eventName', 'testingChange');
        $I->seeNumRecords(4, 'event');
    }

}
