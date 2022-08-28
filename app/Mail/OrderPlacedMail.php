<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private Order $order)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $first_name = auth()->user()->first_name;
        return $this->subject('Your JewelryCG.com order #'.$this->order->order_id.'')
            ->view('emails.orders.placed')
            ->with([
                'first_name' => $first_name,
                'orderID' => $this->order->order_id,
                'order_items' => $this->order->items->map(function($i) {
                    $i->getSelfWithProductInfo();
                    return $i->setPriceToFloat();
                })
            ]);
    }
}
