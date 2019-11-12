<?php 

class RegisterScreenCest
{
    public function registerWorking(AcceptanceTester $I)
    {
        $I->amOnPage('/RegisterScreen');
        $I->see('Register', 'body h1');

        //invalid register
        $I->fillField('username', 'ab');
        $I->fillField('password', 'cd');
        $I->click('Register');
        $I->see('User already exists!');

        //valid register
        $I->fillField('username', 'test');
        $I->fillField('password', 'test');
        $I->click('Register');
        $I->amOnPage('/LoginScreen');
    }
}
