<?php

namespace App\Models\UserManagement;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role;

class UserRole extends Model
{
    use HasFactory,SoftDeletes,LogsActivity,CausesActivity;

    protected $table = 'roles';

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
            if ($model->users()->exists()) {
                throw new Exception("Model have child records");
            }
        });

    }

    public function users(){
        return $this->hasOne(User::class, 'user_role_id', 'id');
    }

}
