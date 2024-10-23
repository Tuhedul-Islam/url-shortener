<?php

namespace App\Models;

use App\Models\BasicParameter\Country;
use App\Models\BasicParameter\District;
use App\Models\BasicParameter\Organization;
use App\Models\BasicParameter\OfficeType;
use App\Models\HRManagement\EmployeeInformation;
use App\Models\MasterConfiguration\OfficeName;
use App\Models\MasterConfiguration\UserType;
use App\Models\UserManagement\OfficeAppointment;
use App\Models\UserManagement\UserProfile;
use App\Models\UserManagement\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, LogsActivity, CausesActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected static $logOnlyDirty = true;
    protected static $logAttributes = ["*"];
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This instance has been {$eventName}";
    }


    public static function boot()
    {
        parent::boot();

        if(Auth::user()){

            static::creating(function ($model) {
                $model->created_by = isset(Auth::user()->id)?Auth::user()->id:1;
                $model->updated_by = isset(Auth::user()->id)?Auth::user()->id:1;
            });

            static::updating(function ($model) {
                $model->updated_by = isset(Auth::user()->id)?Auth::user()->id:1;
            });
        }

        static::deleting(function($model) {
            /*if ( $model->base()->exists() ) {
                throw new Exception("Model have child records");
            }*/
        });
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() : BelongsTo{
        return $this->belongsTo(UserRole::class,'user_role_id', 'id');
    }
    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
