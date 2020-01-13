<?php
use App\DripEmailer;
use App\Student;
namespace App\Console\Commands;
use Illuminate\Support\Facades\Notification;
use Illuminate\Console\Command;
use App\Notifications\MissYouEmail;
use Illuminate\Http\Request;
use Carbon\Carbon;


class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send miss-you e-mails to a student';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(request $request)
    {
        $current_timestamp = Carbon::now()->timestamp; // Produces something like 1552296328
        $students= Student::where (strtotime('created_at'),'<',$current_timestamp)->get();
         Notification::send($students, new MissYouEmail($students)) ; 
        // $id= $request->user()->id;
        // $student = Student::find($id);
        // $student->notify(new MissYouEmail($student));
       
      }
}
