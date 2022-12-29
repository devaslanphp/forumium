<?php

namespace App\Jobs;

use App\Core\NotificationConstants;
use App\Core\PointsConstants;
use App\Models\Point;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateUserPointsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $source;
    public $type;
    public $notify;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $source, $type, $notify = true)
    {
        $this->user = $user;
        $this->source = $source;
        $this->type = $type;
        $this->notify = $notify;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (PointsConstants::caseToDelete($this->type)) {
            $toDelete = Point::where('source_type', get_class($this->source))
                ->where('source_id', $this->source->id)
                ->get();
            foreach ($toDelete as $itemToDelete) {
                $user = User::where('id', $itemToDelete->user_id)->first();
                $user->total_points = $user->total_points - $itemToDelete->value;
                $user->save();

                $itemToDelete->delete();
            }
        } else {
            $points = PointsConstants::value($this->type);
            $point = Point::create([
                'user_id' => $this->user->id,
                'source_type' => get_class($this->source),
                'source_id' => $this->source->id,
                'type' => $this->type,
                'value' => $points
            ]);
            $this->user->total_points = $this->user->total_points + $points;
            $this->user->save();
            if ($this->notify) {
                dispatch(new DispatchNotificationsJob($this->user, NotificationConstants::POINTS_UPDATED->value, [
                    'added' => $point->value,
                    'current' => $this->user->total_points
                ]));
            }
        }
    }

}
