<?php

namespace App;

use App\Models\LegacyBalance;
use App\Models\UserBalance;
use App\Models\UserPaymentRequest;
use App\Models\UserTask;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $lastname Apellido de la persona
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $username Usuario
 * @property string $password
 * @property int|null $roles_id Id del role asociado al usuario
 * @property int|null $sponsor_id Id del usuario que lo refirio
 * @property int|null $countries_id Id del pais
 * @property string|null $token_login
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property int|null $created_user Id del usuario que creo el registro
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $updated_user Id del usuario que actualizo el registro
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\UserContactInformation|null $contactInformation
 * @property-read \App\Models\Country|null $country
 * @property-read mixed $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|UserPaymentRequest[] $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRolesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTokenLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'countries_id',
        'username',
        'sponsor_id',
        'email',
        'roles_id',
        'password',
        'token_login'
    ];

    protected static $logAttributes = [
        'name',
        'email',
        'roles_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'roles_id');
    }

    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id', 'countries_id');
    }

    public function contactInformation()
    {
        return $this->hasOne('App\Models\UserContactInformation', 'users_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->lastname;
    }

    public function payments()
    {
        return $this->hasMany('App\Models\UserPaymentRequest', 'id', 'users_id');
    }

    public function balanceTotal()
    {
        $wallet = UserBalance::where('users_id', Auth::id())->sum('amount');
        $userPayment = UserPaymentRequest::where("users_id", Auth::id())->Pending()->get()->sum("amount_remove");
        return $wallet-$userPayment;
    }

    public function LegacyBalanceTotal()
    {
        $wallet = LegacyBalance::where('users_id', Auth::id())->sum('amount');
        $userPayment = UserPaymentRequest::where("users_id", Auth::id())->Pending()->get()->sum("amount_remove");
        return $wallet-$userPayment;
    }
    public function taskPerfomanceByDay($date = null)
    {
        if (!$date) {
            $date = new Carbon(date('Y-m-d'));
        }

        return UserTask::whereDate('created_at', $date)->where('users_id', Auth::id())->get();
    }

    public function balance()
    {
        return UserBalance::where('users_id', Auth::id())->get();
    }

    public function referreds()
    {
        return User::where('sponsor_id', $this->id)->get();
    }
}
