<?php

namespace Tests\Feature\Api;

use App\Http\Requests\CreatePageViewRequest;
use App\Jobs\CreatePageViewJob;
use App\Models\PageView;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use Mockery\MockInterface;
use Tests\TestCase;

class PageViewApiTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic feature test example.
     */
    public function test_create_page_view(): void
    {
        Queue::fake();

        $pageView = PageView::factory()->make()->toArray();

        $ipAddress = fake()->ipv4;

        $response = $this->withServerVariables([
            'REMOTE_ADDR'=>$ipAddress
        ])->postJson('/api/page-views',$pageView);

        $response->assertStatus(200);

        $response->assertJson([
            'success'=>true,
        ]);

        Queue::assertPushed(function (CreatePageViewJob $job) use ($pageView,$ipAddress) {
            return $job->pageName->value === $pageView['page_name'] && $job->ipAddress === $ipAddress;
        });
    }

    public function test_create_page_view_name_only_support_enums(){

        Queue::fake();

        $response = $this
            ->postJson('/api/page-views',[
            'page_name'=>'Random'
        ]);

        $response->assertStatus(422);
    }
}
