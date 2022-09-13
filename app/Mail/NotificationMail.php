<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    // public $details;
    public $getTransaksi;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($getTransaksi)
    {
        //
        $this->getTransaksi = $getTransaksi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->getTransaksi['status_transaksi'] == 'Diterima'){
            return $this
                ->subject('Invoice')
                ->view('email.invoiceNotificationEmail');
        }else{
            return $this
                    ->subject('Update Transaksi')
                    ->view('email.updateTransactionEmail');
        }
        
                // ->view('email.notificationEmail');
    }
}