<?php

namespace App\Jobs;

use Mail;
use App\Jobs\SendMail;
use App\Mail\OrderBill;
use App\Models\billCart;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;



class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $orderItem;
    public $billCartUser;
    public $dateNowOrder;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$orderItem,$billCartUser,$dateNowOrder)
    {
        $this->email = $email;
        $this->orderItem = $orderItem;
        $this->billCartUser = $billCartUser;
        $this->dateNowOrder = $dateNowOrder;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

       Mail::to($this->email)->send(new OrderBill($this->orderItem,$this->billCartUser,$this->dateNowOrder));

    }
}
