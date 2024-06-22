<?php

namespace Tests;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Console\Kernel;

class PageTest extends TestCase
{
    use CreatesApplication;

    /**
     * Test homepage returns a successful response
     *
     * @return void
     */
    public function test_homepage_returns_success_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Cuộc đời là những chuyến đi | Travel Tour');
    }

    /**
     * Test search tour page returns a successful response
     *
     * @return void
     */
    public function test_search_tour_page_returns_success_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Tìm kiếm Tour');
    }

    /**
     * Test search hotel page returns a successful response
     *
     * @return void
     */
    public function test_search_hotel_page_returns_success_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Tìm kiếm khách sạn');
    }

    /**
     * Test destination page returns a successful response
     *
     * @return void
     */
    public function test_destination_page_returns_success_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Địa điểm du lịch');
    }

    /**
     * Test tour detail page returns a successful response
     *
     * @return void
     */
    public function test_tour_detail_page_returns_success_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Tour Du Lịch Mới Nhất');
    }

    /**
     * Test about page returns a successful response
     *
     * @return void
     */
    public function test_about_page_returns_success_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Giới thiệu');
    }

    /**
     * Test contact page returns a successful response
     *
     * @return void
     */
    public function test_contact_page_returns_success_response()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Liên hệ');
    }
}