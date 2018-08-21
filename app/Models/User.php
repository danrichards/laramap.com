<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Notifications\Notifiable;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;
use App\Notifications\Users\WelcomeNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\Admin\NotifyAboutNewUserNotification;
use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;

/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $country
 * @property string|null $avatar_path
 * @property string|null $biography
 * @property bool $is_active
 * @property int $is_sponsor
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsSponsor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereZip($value)
 * @mixin \Eloquent
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $access_token
 * @property string|null $address
 * @property string|null $twitter_link
 * @property string|null $linkedin_link
 * @property string|null $github_link
 * @property string|null $facebook_link
 * @property string|null $web_link
 * @property-read string $gravatar
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFacebookLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereGithubLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLinkedinLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereTwitterLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWebLink($value)
 * @property string|null $company
 * @property bool $is_admin
 * @property bool $is_hireable
 * @property-read null|string $avatar
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsHireable($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $blockers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $blocking
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $followers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $following
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $liking
 * @property-read \Illuminate\Support\Collection $activities
 * @property string|null $confirmation_code
 * @property string|null $confirmed_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereConfirmedAt($value)
 */
class User extends Authenticatable implements LikerContract
{
    use HasApiTokens, Notifiable, Searchable, Liker;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
        'is_hireable' => 'boolean',
    ];

    /***
     * @var array
     */
    protected $appends = [
        'gravatar', 'avatar', 'activities',
    ];

    /**
     * Boot method of the model.
     */
    public static function boot()
    {
        parent::boot();
        self::created(function (User $user) {
            $admins = User::all();
            foreach ($admins as $admin) {
                if (env('APP_ENV') === 'production') {
                    if ($admin->is_admin) {
                        $admin->notify(new NotifyAboutNewUserNotification($user));
                    }
                }
            }

            $user->notify(new WelcomeNotification($user));
        });
    }

    /**
     * @return null|string
     */
    public function getAvatarAttribute()
    {
        if ($this->avatar_path) {
            return $this->avatar_path;
        } else {
            return $this->getGravatarAttribute();
        }
    }

    /**
     * @return string
     */
    public function getGravatarAttribute()
    {
        $s = 80;
        $d = 'mp';
        $r = 'g';
        $img = false;
        $atts = [];

        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($this->email)));
        $url .= "?s=$s&d=$d&r=$r";

        if ($img) {
            $url = '<img src="'.$url.'"';
            foreach ($atts as $key => $val) {
                $url .= ' '.$key.'="'.$val.'"';
            }
            $url .= ' />';
        }

        return $url;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getActivitiesAttribute()
    {
        return Activity::where('causer_id', $this->id)->get();
    }
}
