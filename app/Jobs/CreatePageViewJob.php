<?php

namespace App\Jobs;

use App\Enums\PageNameEnum;
use App\Models\PageView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreatePageViewJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private PageNameEnum $pageName,
        private string $ipAddress)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        PageView::create([
            'page_name'=>$this->pageName,
            'ip_address'=>$this->ipAddress
        ]);
    }
}