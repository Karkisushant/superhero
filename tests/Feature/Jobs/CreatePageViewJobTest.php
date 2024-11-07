<?php

namespace Tests\Feature\Jobs;

use App\Enums\PageNameEnum;
use App\Jobs\CreatePageViewJob;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request;
use Tests\TestCase;

class CreatePageViewJobTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_page_view_job_inserts_data_to_table(): void
    {
        $ipAddress = fake()->ipv4;
         Carbon::setTestNow($timeStamp = Carbon::now());

        CreatePageViewJob::dispatch(
            PageNameEnum::PRODUCTS,
            $ipAddress);

        $this->assertDatabaseHas('page_views',[
            'page_name'=>PageNameEnum::PRODUCTS->value,
            'ip_address'=>$ipAddress,
            'created_at'=>$timeStamp
        ]);
    }
}
