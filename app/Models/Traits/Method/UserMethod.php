<?php

namespace App\Models\Traits\Method;

use Illuminate\Support\Collection;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    /**
     * @return bool
     */
    public function isMaster(): bool
    {
        return $this->id === 1;
    }

    /**
     * @return mixed
     */
    public function isUser(): bool
    {
        return $this->type === self::TYPE_USER;
    }

    /**
     * @return mixed
     */
    public function hasAllAccess(): bool
    {
        return $this->isAdmin() && $this->hasRole(config('quickstart.access.role.admin'));
    }

    /**
     * @return mixed
     */
    public function isAdmin(): bool
    {
        return $this->type === self::TYPE_ADMIN;
    }

    /**
     * @param $type
     *
     * @return bool
     */
    public function isType($type): bool
    {
        return $this->type === $type;
    }

    /**
     * @return mixed
     */
    public function canChangeEmail(): bool
    {
        return config('quickstart.access.user.change_email');
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->email_verified_at !== null;
    }

    /**
     * @return bool
     */
    public function isSocial(): bool
    {
        return $this->provider && $this->provider_id;
    }

    /**
     * @return Collection
     */
    public function getPermissionDescriptions(): Collection
    {
        return $this->permissions->pluck('description');
    }

    /**
     * @param bool $size
     *
     * @return mixed|string
     */
    public function getAvatar($size = null)
    {
        if ($this->profile_picture) {
            $avatar = $this->profile_picture;
        } else {
            $avatar = 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F' . urlencode(str_replace(' ', '+', $this->full_name)) . '/' . config('quickstart.avatar.size');
        }
        return $avatar;
    }
}
