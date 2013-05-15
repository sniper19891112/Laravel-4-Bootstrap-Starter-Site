<?php

use Mockery as m;
use Woodling\Woodling;

class UserTest extends TestCase {

    public function testUsername()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertEquals( $user->username, 'admin' );
    }

    public function testIsConfirmedByEmail()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertEquals( $user->isConfirmed(array('email'=>'admin@example.org')), 1 );
    }

    public function testIsConfirmedByEmailFail()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertNotEquals( $user->isConfirmed(array('email'=>'non-user@example.org')), true );
    }

    public function testIsConfirmedByUsername()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertEquals( $user->isConfirmed(array('email'=>'admin')), true );
    }

    public function testIsConfirmedByUsernameFail()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertNotEquals( $user->isConfirmed(array('email'=>'non-user')), true );
    }

    public function testGetByUsername()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertNotEquals( $user->getUserByUsername('admin'), false );
    }

    public function testGetByUsernameFail()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertEquals( $user->getUserByUsername('non-user'), false );
    }

    public function testJoined()
    {
        $user = Woodling::retrieve('UserAdmin');
        $this->assertGreaterThan( 0, strpos($user->joined(), 'ago') );
    }

}
