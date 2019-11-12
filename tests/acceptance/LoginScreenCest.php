<?php 

class LoginScreenCest
{
    public function loginWorking(AcceptanceTester $I)
    {
        //invalid login
        $I->amOnPage('/LoginScreen');
        $I->see('Login', 'body h1');
        $I->fillField('username','invalid');
        $I->fillField('password','invalid');
        $I->click('Login');
        $I->see('User does not exist!');



        //valid login
        $I->fillField('username', 'ab');
        $I->fillField('password', 'cd');
        $I->click('Login');
        $I->see('Home Page');
    }


}
