<?php

namespace App\Listeners\User;

use App\Events\User\UserCreated;
use App\Events\User\UserDeleted;
use App\Events\User\UserUpdated;
use App\Events\User\UserLoggedIn;
use App\Events\User\UserRestored;
use App\Events\User\UserConfirmed;
use App\Events\User\UserLoggedOut;
use App\Events\User\UserRegistered;
use App\Events\User\UserDeactivated;
use App\Events\User\UserReactivated;
use App\Events\User\UserUnconfirmed;
use App\Events\User\UserSocialDeleted;
use App\Events\User\UserPasswordChanged;
use App\Events\User\UserPermanentlyDeleted;
use App\Events\User\UserProviderRegistered;

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
        $ip_address = request()->getClientIp();

        // Update the logging in users time & IP
        $event->user->fill([
            'last_login_at' => now()->toDateTimeString(),
            'last_login_ip' => $ip_address,
        ]);

        // Update the timezone via IP address
        $geoip = geoip($ip_address);

        if ($event->user->timezone !== $geoip['timezone']) {
            // Update the users timezone
            $event->user->fill([
                'timezone' => $geoip['timezone'],
            ]);
        }

        $event->user->save();

        logger('User Logged In: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onLoggedOut($event)
    {
        logger(__('Usuario Cerro Sesión: '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        logger(__('Usuario Registrado: '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onProviderRegistered($event)
    {
        logger(__('Proveedor de Usuario Registrado: '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Creado'));
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Actualizado'));
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Eliminado'));
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Confirmado'));
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Desconfirmado'));
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        logger(__('Contraseña Actualizada Para '.$event->user->full_name));
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Desactivado'));
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Reactivado'));
    }

    /**
     * @param $event
     */
    public function onSocialDeleted($event)
    {
        logger(__('Cuenta Social '.$event->user->full_name.' '.'Eliminada'));
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Eliminado Permanentemente'));
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        logger(__('Usuario '.$event->user->full_name.' '.'Restaurado'));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            UserCreated::class,
            'App\Listeners\User\UserEventListener@onCreated'
        );

        $events->listen(
            UserUpdated::class,
            'App\Listeners\User\UserEventListener@onUpdated'
        );

        $events->listen(
            UserDeleted::class,
            'App\Listeners\User\UserEventListener@onDeleted'
        );

        $events->listen(
            UserConfirmed::class,
            'App\Listeners\User\UserEventListener@onConfirmed'
        );

        $events->listen(
            UserUnconfirmed::class,
            'App\Listeners\User\UserEventListener@onUnconfirmed'
        );

        $events->listen(
            UserPasswordChanged::class,
            'App\Listeners\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            UserDeactivated::class,
            'App\Listeners\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            UserReactivated::class,
            'App\Listeners\User\UserEventListener@onReactivated'
        );

        $events->listen(
            UserSocialDeleted::class,
            'App\Listeners\User\UserEventListener@onSocialDeleted'
        );

        $events->listen(
            UserPermanentlyDeleted::class,
            'App\Listeners\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            UserRestored::class,
            'App\Listeners\User\UserEventListener@onRestored'
        );

        $events->listen(
            UserLoggedIn::class,
            'App\Listeners\User\UserEventListener@onLoggedIn'
        );

        $events->listen(
            UserLoggedOut::class,
            'App\Listeners\User\UserEventListener@onLoggedOut'
        );

        $events->listen(
            UserRegistered::class,
            'App\Listeners\User\UserEventListener@onRegistered'
        );

        $events->listen(
            UserProviderRegistered::class,
            'App\Listeners\User\UserEventListener@onProviderRegistered'
        );

        $events->listen(
            UserConfirmed::class,
            'App\Listeners\User\UserEventListener@onConfirmed'
        );
    }
}
