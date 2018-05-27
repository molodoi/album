<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Events\CategorySaving as EventCategorySaving;

class CategorySaving
{
    /**
     * Handle the event.
     *
     * @param EventCategorySaving|object $event
     * @return void
     */
    public function handle(EventCategorySaving $event)
    {
        $event->model->slug = str_slug($event->model->name, '-');
    }
}
