<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderProcessingNotification extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    public function getOrderStages()
    {
        $stages = [];

        for($i = 0; $i <= 100; $i++){
            if ($i <= 10){
                $stages[$i]['stage'] = "Reading and Checking";
                $stages[$i]['paragraph'] = "stage of reading and checking";
            }else if ($i <= 20){
                $stages[$i]['stage'] = "Distribution Stage";
                $stages[$i]['paragraph'] = "distribution stage";
            }else if ($i <= 70){
                $stages[$i]['stage'] = "Translation Stage";
                $stages[$i]['paragraph'] = "translation stage";
            }else if ($i <= 80){
                $stages[$i]['stage'] = "Revision / Proofreading";
                $stages[$i]['paragraph'] = "revision / proofreading stage";
            }else if ($i < 100){
                $stages[$i]['stage'] = "Examination Stage";
                $stages[$i]['paragraph'] = "examination stage";
            }
            if ($i == 100){
                $stages[$i]['stage'] = "uploading";
                $stages[$i]['paragraph'] = "uploading";
            }
        }

        return $stages;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('')
                    ->markdown("emails.order_processing",[
                        "stages" => $this->getOrderStages(),
                        "order" => $this->order,
                        "user_name" => $notifiable->name,
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
