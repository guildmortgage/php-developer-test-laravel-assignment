<?php

namespace Tests\Feature;

use App\Http\Controllers\BorrowersController;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class BorrowersControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_basic_request()
    {
        $expectedResponse = '{"status":1,"data":[{"name":"Clark Kent","totalIncome":225000},{"name":"Hal Jordan","totalIncome":175000}]}';

        $BorrowersController = new BorrowersController();
        $response = json_encode($BorrowersController->index());
        
        assertEquals($expectedResponse, $response);
    }
}