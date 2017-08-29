<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token=$token;
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
                    ->greeting('Xin Chào Bạn!')
                    ->from('manhquangit@gmail.com','Mạnh Quang')
                    ->subject('YvesRocher Lập Lại Mật Khẩu Cá Nhân')
                    ->line('Thông báo.')
                    ->action('Xác nhận lập lại mật khẩu', route('backend.password.reset',$this->token))
                    ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');

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
