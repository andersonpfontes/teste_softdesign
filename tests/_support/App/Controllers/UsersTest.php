<?php

namespace Tests\Support\App\Controllers;

use App\Controllers\Users;
use App\Models\UserModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

// We're testing Users class, which is a controller
class UsersTest extends CIUnitTestCase
{
    use ControllerTestTrait;

    // Define setup method to instantiate userModel and userController, which would be common to your test cases
    public function setUp(): void
    {
        parent::setUp();
        $this->userModel = new UserModel();
        $this->userController = new Users();
    }

    // We're testing the index method of Users controller
    public function testIndex(): void
    {
        $_POST['email'] = 'test@test.com';
        $_POST['password'] = 'testpassword';
        $result = $this->withRequest($this->request)->controller(Users::class)->execute('index');

        // Write assertions as per your use case
        $this->assertTrue(session()->has('isLoggedIn'));
        $this->assertTrue(session()->get('isLoggedIn'));
    }

    //Consider adding other tests for rest of the use cases

    // Define teardown method to unset userModel and userController
    public function tearDown(): void
    {
        parent::tearDown();
        $this->userModel = null;
        $this->userController = null;
    }
}