<?php

namespace App\Rules;

use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Auth\UserRepository;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class UnusedPassword.
 */
class UnusedPassword implements Rule
{
    /**
     * @var
     */
    protected $user;

    /**
     * Create a new rule instance.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Option is off
        if (! config('access.users.password_history')) {
            return true;
        }

        if (! $this->user instanceof User) {
            if (is_numeric($this->user)) {
                $this->user = resolve(UserRepository::class)->getById($this->user);
            } else {
                $this->user = resolve(UserRepository::class)->findByPasswordResetToken($this->user);
            }
        }

        if (! $this->user || null === $this->user) {
            return false;
        }

        $histories = $this->user
            ->passwordHistories()
            ->take(config('access.users.password_history'))
            ->orderBy('id', 'desc')
            ->get();

        foreach ($histories as $history) {
            if (Hash::check($value, $history->password)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('No puede establecer una contraseña que haya usado previamente.');
    }
}
