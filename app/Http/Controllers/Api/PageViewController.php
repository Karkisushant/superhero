<?php

namespace App\Http\Controllers\Api;

use App\Enums\PageNameEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePageViewRequest;
use App\Jobs\CreatePageViewJob;

class PageViewController extends Controller
{
    public function store(CreatePageViewRequest $request)
    {
        CreatePageViewJob::dispatch(
            PageNameEnum::from($request->input('page_name')),
            $request->ip(),
            now()
        );

        return $this->sendSuccess('Page View being created');
    }
}
