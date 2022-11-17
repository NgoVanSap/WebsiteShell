<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Repositories\CartLists;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class LoadCartProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $viewCartList;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CartLists $viewCartList)
    {
        $this->viewCartList = $viewCartList;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return $this->viewCartList->getViewCartList();

    }
}
