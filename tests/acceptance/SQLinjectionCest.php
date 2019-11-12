<?php 

class SQLinjectionCest
{
    public function antiSQLinjectionWorking(AcceptanceTester $I)
    {
        //try sql injection
        $I->amOnPage('/LoginScreen');
        $I->see('Login', 'body h1');
        $I->fillField('username','\' OR \'1');
        $I->fillField('password','\' OR \'1');
        $I->click('Login');
        $I->see('User does not exist!');

        $I->amOnPage('/RegisterScreen');
        $I->see('Register', 'body h1');
        $I->fillField('username','FI\'; DROP TABLE test --');
        $I->fillField('password','FI\'; DROP TABLE test --');
        $I->click('Register');
        $I->see('Login');

        //login properly
        $I->amOnPage('/LoginScreen');
        $I->see('Login', 'body h1');
        $I->fillField('username','ab');
        $I->fillField('password','cd');
        $I->click('Login');


        $I->amOnPage('/HomePage');
        $I->see('Home Page', 'body h1');
        $I->fillField('search','FI\'; DROP TABLE test --');
        $I->click('submit');
        $I->see('No results were found');
    }


}
