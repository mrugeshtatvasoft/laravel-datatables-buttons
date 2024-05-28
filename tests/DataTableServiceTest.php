<?php

namespace mrugeshtatvasoft\DataTables\Buttons\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use mrugeshtatvasoft\DataTables\Buttons\Tests\DataTables\UsersDataTable;
use mrugeshtatvasoft\DataTables\Buttons\Tests\Models\User;
use mrugeshtatvasoft\DataTables\EloquentDataTable;

class DataTableServiceTest extends TestCase
{
    use DatabaseTransactions;

    #[Test]
    public function it_can_handle_ajax_request(): void
    {
        $response = $this->getAjax('/users');

        $response->assertJson([
            'draw' => 0,
            'recordsTotal' => 20,
            'recordsFiltered' => 20,
        ]);
    }

    #[Test]
    public function it_returns_view_on_normal_get_request(): void
    {
        $response = $this->get('users');

        $response->assertSeeText('users-table');
        $response->assertSeeText('LaravelDataTables');
    }

    #[Test]
    public function it_can_return_a_csv_file(): void
    {
        $response = $this->get('users?action=csv');

        $this->assertInstanceOf(BinaryFileResponse::class, $response->baseResponse);
    }

    #[Test]
    public function it_can_return_a_xls_file(): void
    {
        $response = $this->get('users?action=excel');

        $this->assertInstanceOf(BinaryFileResponse::class, $response->baseResponse);
    }

    #[Test]
    public function it_can_return_a_pdf_file(): void
    {
        $response = $this->get('users?action=pdf');

        $this->assertInstanceOf(Response::class, $response->baseResponse);
    }

    #[Test]
    public function it_allows_before_response_callback(): void
    {
        $response = $this->getAjax('users/before');
        $response->assertOk();

        $row = $response['data'][0];
        $this->assertEquals($row['name'].'X', $row['nameX']);
    }

    #[Test]
    public function it_allows_response_callback(): void
    {
        $response = $this->getAjax('users/response');
        $response->assertOk();

        $this->assertEquals(2, $response->json('recordsTotal'));
        $this->assertEquals(1, $response->json('recordsFiltered'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $router = $this->app['router'];
        $router->get('/users', fn (UsersDataTable $dataTable) => $dataTable->render('tests::users'));

        $router->get('/users/before', fn (UsersDataTable $dataTable) => $dataTable->before(function (EloquentDataTable $dataTable) {
            $dataTable->addColumn('nameX', fn (User $user) => $user->name.'X');
        })->render('tests::users'));

        $router->get('/users/response', fn (UsersDataTable $dataTable) => $dataTable->response(function (Collection $data) {
            $data['recordsTotal'] = 2;
            $data['recordsFiltered'] = 1;

            return $data;
        })->render('tests::users'));
    }
}
