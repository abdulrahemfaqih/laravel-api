<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $this->post("/api/users", [
            "username" => "faqih",
            "password" => "faqih3935",
            "name" => "Abdul Rahem Faqih"
        ])->assertStatus(201)
            ->assertJson([
                "data" => [
                    "username" => "faqih",
                    "name" => "Abdul Rahem Faqih"
                ]
            ]);
    }

    public function testRegisterFailed()
    {
        $this->post("/api/users", [
            "username" => "",
            "password" => "",
            "name" => ""
        ])->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "username" => [
                        "the username field is required."
                    ],
                    "password" => [
                        "the password field is required."
                    ],
                    "name" => [
                        "the name field is required."
                    ]
                ]
            ]);
    }

    public function testRegisterUsernameAlreadyExist() {}
}
