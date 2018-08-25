<?php

namespace App\Observers;

use App\UserAction;
use Illuminate\Support\Facades\Auth;

class UserActionObserver
{
    public function retrieved($model)
    {

    }

    public function creating($model)
    {

    }

    public function created($model)
    {

    }

    public function updating($model)
    {

    }

    public function updated($model)
    {

    }

    public function saving($model)
    {

    }

    public function saved($model)
    {
        if ($model->wasRecentlyCreated == true) {
            // Data was just created
            $action = 'created';
        } else {
            // Data was updated
            $action = 'updated';
        }
        if (Auth::check()) {
            UserAction::create([
                'user_id'      => Auth::user()->id,
                'action'       => $action,
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }
    }

    public function restoring($model)
    {

    }

    public function restored($model)
    {

    }

    public function deleting($model)
    {
        if (Auth::check()) {
            UserAction::create([
                'user_id'      => Auth::user()->id,
                'action'       => 'deleted',
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }

    }

    public function deleted($model)
    {

    }

    public function forceDeleted($model)
    {

    }
}

?>