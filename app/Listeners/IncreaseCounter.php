<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PostViewer;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostViewer $event)
    {
        if(!(session()->has('visited')))
            $this->updateViewer($event->post);
        else
            false;
    }

    public function updateViewer($post)
    {
        $post->viewer = $post->viewer + 1;
        $post->save();
        session()->put('visited');
    }

}
