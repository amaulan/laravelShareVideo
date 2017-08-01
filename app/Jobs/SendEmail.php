<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $to;
    protected $subject;
    protected $content;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to, $subject, $content)
    {
        $this->to               = $to;
        $this->subject          = $subject;
        $this->content          = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data           = [
            'to'        => $this->to,
            'subject'   => $this->subject
        ];

        try{ 
            \Mail::send( 'mail-templates.attention' , [ 'content' => $this->content ], function($mail) use($data){
                foreach( $data['to']  as $key => $value)
                {
                    $mail->from('ayat.maulana@indosystem.com', 'Ayat Maulana');
                    $mail->to($value);
                    $mail->subject($data['subject']);
                }
            });
        } catch(\Exception $e)
        {
            \Log::info($e->getMessage());
        }
    }
}
