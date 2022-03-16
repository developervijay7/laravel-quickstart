<?php

namespace App\Listeners;

use App\Events\Auth\UserCreated;
use App\Events\Auth\UserRegistered;
use App\Events\Auth\UserDeleted;
use App\Events\Auth\UserDestroyed;
use App\Events\Auth\UserLoggedIn;
use App\Events\Auth\UserRestored;
use App\Events\Auth\UserStatusChanged;
use App\Events\Auth\UserUpdated;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Events\Dispatcher;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onLoggedIn($event)
    {
        // Update the logging in users time & IP
        $event->user->update([
            'last_login_at' => now(),
            'last_login_ip' => request()->getClientIp(),
        ]);
    }

    /**
     * @param $event
     */
    public function onPasswordReset($event)
    {
        $event->user->update([
            'password_changed_at' => now(),
        ]);
    }

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        activity('user')
            ->performedOn($event->user)
            ->withProperties([
                'user' => [
                    'type' => $event->user->type,
                    'first_name' => $event->user->first_name,
                    'last_name' => $event->user->last_name,
                    'email' => $event->user->email,
                    'mobile' => $event->user->mobile,
                    'active' => $event->user->active,
                    'email_verified_at' => $event->user->email_verified_at,
                ],
                'roles' => $event->user->roles->count() ? $event->user->roles->pluck('name')->implode(', ') : 'None',
                'permissions' => $event->user->permissions ? $event->user->permissions->pluck('description')->implode(', ') : 'None',
            ])
            ->log(':causer.first_name :causer.last_name created user :subject.first_name :subject.last_name with roles: :properties.roles and permissions: :properties.permissions');
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        activity('user')
            ->performedOn($event->user)
            ->withProperties([
                'user' => [
                    'first_name' => $event->user->first_name,
                    'last_name' => $event->user->last_name,
                    'email' => $event->user->email,
                    'mobile' => $event->user->mobile
                ],
            ])
            ->log(':causer.first_name :causer.last_name created an account with' . appName() . ' at ' . now());
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        activity('user')
            ->performedOn($event->user)
            ->withProperties([
                'user' => [
                    'type' => $event->user->type,
                    'first_name' => $event->user->first_name,
                    'last_name' => $event->user->last_name,
                    'email' => $event->user->email,
                    'mobile' => $event->user->mobile,
                ],
                'roles' => $event->user->roles->count() ? $event->user->roles->pluck('name')->implode(', ') : 'None',
                'permissions' => $event->user->permissions ? $event->user->permissions->pluck('description')->implode(', ') : 'None',
            ])
            ->log(':causer.first_name :causer.last_name updated user :subject.first_name :subject.last_name with roles: :properties.roles and permissions: :properties.permissions');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        activity('user')
            ->performedOn($event->user)
            ->log(':causer.first_name :causer.last_name deleted user :subject.first_name :subject.last_name');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        activity('user')
            ->performedOn($event->user)
            ->log(':causer.first_name :causer.last_name restored user :subject.first_name :subject.last_name');
    }

    /**
     * @param $event
     */
    public function onDestroyed($event)
    {
        activity('user')
            ->performedOn($event->user)
            ->log(':causer.first_name :causer.last_name permanently deleted user :subject.first_name :subject.last_name');
    }

    /**
     * @param $event
     */
    public function onStatusChanged($event)
    {
        activity('user')
            ->performedOn($event->user)
            ->log(':causer.first_name :causer.last_name ' . ($event->status === 0 ? 'deactivated' : 'reactivated') . ' user :subject.first_name :subject.last_name');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     */
    public function subscribe($events)
    {
        return [
            PasswordReset::class => 'onPasswordReset',
            UserCreated::class => 'onCreated',
            UserRegistered::class => 'onRegistered',
            UserUpdated::class => 'onUpdated',
            UserDeleted::class => 'onDeleted',
            UserRestored::class => 'onRestored',
            UserDestroyed::class => 'onDestroyed',
            UserStatusChanged::class => 'onStatusChanged',
        ];
    }
}
