<?php

namespace App\Mail;

use App\Mail\OrderBill;
use App\Models\billCart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\oderItemCheckout;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;




class OrderBill extends Mailable
{
    use Queueable, SerializesModels;


    public $orderItem;
    public $billCartUser;
    public $dateNowOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderItem,$billCartUser,$dateNowOrder)
    {

        $this->orderItem = $orderItem;
        $this->billCartUser = $billCartUser;
        $this->dateNowOrder = $dateNowOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('website.emailCheckout.emailCheckOut',[
            'orderItem' => $this->orderItem,
            'billCartUser' => $this->billCartUser,
            'dateNowOrder' => $this->dateNowOrder,
        ]);
    }
}
