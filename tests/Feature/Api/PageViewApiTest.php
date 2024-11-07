<?php

namespace Tests\Feature\Api;

use App\Models\PageView;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
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

        $response = $this->postJson('/api/page-views',$pageView);

        $response->assertStatus(200);

        $response->assertJson([
            'success'=>true,
        ]);
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
