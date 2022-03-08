<?php

namespace App\Domain\Users\Models;

use App\Domain\Users\Notifications\ResetPassword;
use App\Domain\Users\Notifications\VerifyEmail;
use App\Domain\Users\Notifications\VerifyPhone;
use App\Services\FilterService\Filterable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Domain\Reviews\Models\Review;
use Laravel\Passport\HasApiTokens;

/**
 * App\Domain\Users\Models\User
 *
 * @property int $id
 * @property string $role
 * @property int|null $level
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $username
 * @property string|null $phone
 * @property string|null $birthday
 * @property string|null $personality
 * @property int|null $active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User admins()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User filter(\App\Services\FilterService\Filter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User wherePersonality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereUsername($value)
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User drivers()
 * @property-read \App\Domain\Users\Models\UserRequisite $requisite
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User users()
 * @property string|null $licence_number
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereLicenceNumber($value)
 * @property string|null $api_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereApiToken($value)
 * @property string|null $fcm_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereFcmToken($value)
 * @property string|null $phone_verified_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User wherePhoneVerifiedAt($value)
 * @property string|null $phone_code
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User wherePhoneCode($value)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
    const ROLE_ADMIN = 'admin';
    const ROLE_PARTNER = 'partner';
    const ROLE_DRIVER = 'driver';
    const ROLE_USER = 'user';

    const STATUS_ACTIVE = 1;
    const STATUS_NOT_ACTIVE = 0;

    const PERSONALITY_LEGAL = 'legal';
    const PERSONALITY_INDIVIDUAL = 'individual';

    protected $guarded = [
        'id'
    ];

    public static function roles()
    {
        return [
            static::ROLE_ADMIN,
            static::ROLE_PARTNER,
            static::ROLE_DRIVER,
            static::ROLE_USER,
        ];
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public static function statuses()
    {
        return [
            static::STATUS_ACTIVE,
            static::STATUS_NOT_ACTIVE,
        ];
    }

    public static function personalities()
    {
        return [
            static::PERSONALITY_LEGAL,
            static::PERSONALITY_INDIVIDUAL,
        ];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role === static::ROLE_ADMIN;
    }

    public function isUser()
    {
        return $this->role === static::ROLE_USER;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmins($query)
    {
        return $query->where('role', static::ROLE_ADMIN);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDrivers($query)
    {
        return $query->where('role', static::ROLE_DRIVER);
    }


    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUsers($query)
    {
        return $query->where('role', static::ROLE_USER);
    }

    /**
     * Check role
     *
     * @param array|string $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        $myRoles = self::roles();

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if (in_array($role, $myRoles) && $this->role == $role) {
                    return true;
                }
            }

            return false;
        }

        return in_array($roles, $myRoles) && $this->role == $roles;
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        if (filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
            $this->notify(new VerifyEmail);
        } else {
            $this->notify(new VerifyPhone);
        }
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function requisite()
    {
        return $this->hasOne(UserRequisite::class);
    }

    public function hasVerified()
    {
        if (filter_var($this->username, FILTER_VALIDATE_EMAIL)) {
            return $this->hasVerifiedEmail();
        } else {
            return ! is_null($this->phone_verified_at);
        }
    }
}
