<?php

namespace App\Listeners;

use App\Events\Role\RoleCreated;
use App\Events\Role\RoleDeleted;
use App\Events\Role\RoleUpdated;
use Illuminate\Events\Dispatcher;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        activity('role')
            ->performedOn($event->role)
            ->withProperties([
                'role' => [
                    'type' => $event->role->type,
                    'name' => $event->role->name,
                ],
                'permissions' => $event->role->permissions->count() ? $event->role->permissions->pluck('description')->implode(', ') : 'None',
            ])
            ->log(':causer.first_name :causer.last_name created role :subject.name with permissions: :properties.permissions');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        activity('role')
            ->performedOn($event->role)
            ->withProperties([
                'role' => [
                    'type' => $event->role->type,
                    'name' => $event->role->name,
                ],
                'permissions' => $event->role->permissions->count() ? $event->role->permissions->pluck('description')->implode(', ') : 'None',
            ])
            ->log(':causer.first_name :causer.last_name updated role :subject.name with permissions: :properties.permissions');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        activity('role')
            ->performedOn($event->role)
            ->log(':causer.first_name :causer.last_name deleted role :subject.name');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe($events)
    {
        return [
            RoleCreated::class => 'onCreated',
            RoleUpdated::class => 'onUpdated',
            RoleDeleted::class => 'onDeleted',
        ];
    }
}
