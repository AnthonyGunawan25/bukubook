<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200); //berhasil ke halaman login
        // ada input email address
        $response->assertSeeText("Email Address");
        //ada input password
        $response->assertSeeText("Password");
    }

    // public function test_admin_can_login_to_app()
    // {
    //     $response = $this->post("/login", [
    //         "email" => "admin@bukubook.com",
    //         "password" => "4dm1n"
    //     ]);

    //     // berhasil dpt session
    //     $this->assertAuthenticated();

    //     // diarahkan ke home
    //     $response->assertRedirect("/home");

    //     $responseHome = $this->get("/home");
    //     $responseHome-> assertSeeText("Welcome to the app admin");
    // }

    public function test_logged_in_user_can_logout(){
        // login admin
        $response = $this->post("/login", [
            "email" => "admin@bukubook.com",
            "password" => "4dm1n"
        ]);
        // assert authenticated
        $this->assertAuthenticated();

        // request get ke home
        $responseHome = $this -> get("/home");
        // buat request method post ke /logout
        $this->post("/logout");
        // request get ke home
        $responseHome = $this-> get("/home");
        // asset restricted ke halaman login
        $response->assertRedirect("/login");
    }

    public function test_register_page_is_accesible(){
        $response = $this->post("/register", [
                    "name" => "aditya",
                    "email" => "admin@bukubook.com",
                    "pasword" => "strongpaswordgit",
                    "confirmpassword" => "4dm1n"
                ]);

    }

    // public function test_new_user_can_register(){

    // }
}
