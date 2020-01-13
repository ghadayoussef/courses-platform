<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Course;
use App\User;

class CourseEnrolled extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
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
    public function toMail($student)
    { $course=$this->course;
        $user=User::find($course->user_id);
        return (new MailMessage)
                    ->subject('Enrolled in '.$course->name.' Course')
                    ->greeting('Hey '.$student->name.',')
                    ->line(' It’s '.$user->name.' here. I am so glad that you joined '.$course->name.' Course which will start on '.date('d-m-Y',strtotime($course->start_date)).' .')
                    ->line('Thanks.');
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
