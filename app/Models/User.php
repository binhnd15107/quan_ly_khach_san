<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    protected $table = 'users';
    protected $table_model_has_roles = 'model_has_roles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'image', 'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    private function DB()
    {
        return DB::table($this->table);
    }
    public function getList($request)
    {
        $q = $request->has('q') ? $request->q : "";

        $orderBy = $request->has('orderBy') ? $request->orderBy : 'id';
        $sortBy = $request->has('sortBy') ? $request->sortBy : "desc";
        $softDelete = $request->has('soft_delete') ? $request->soft_delete : null;
        $roleId = $request->has('roles_id') ? $request->roles_id : null;
        $query = $this->joinRole()
            ->where($this->table . '.email', 'like', '%' . $q . '%');
        if ($softDelete != null) {
            $query->where($this->table . '.status', '=', config('util.IN_DROP'));
        } else {
            $query->where($this->table . '.status', '=',  config('util.UN_DROP'));
        }
        if ($sortBy == "desc") {
            $query->orderByDesc($this->table . '.' . $orderBy);
        } else {
            $query->orderBy($this->table . '.' . $orderBy);
        }
        if ($roleId != null) {
            $query->where('role_id', '=',  $roleId);
        }
        return $query;
    }
    public function index($request)
    {
        return  $this->getList($request)->paginate(request('limit') ?? 10);
    }
    public function find($id)
    {
        $query = $this->DB()->find($id);
        return $query;
    }
    public function drop($id)
    {
        $res = $this->DB()
            ->where('id', $id)
            ->update(['status' => config('util.IN_DROP')]);
        return $res;
    }
    public function backUp($id)
    {
        $res = $this->DB()
            ->where('id', $id)
            ->update(['status' => config('util.UN_DROP')]);
        return $res;
    }

    //join đến bảng role
    public function joinRole()
    {
        return $this->DB()->select($this->table . '.*',  'roles.name as role_name', 'roles.id as role_id')
            ->join('model_has_roles', function ($join) {
                $join->on($this->table . '.id', '=', 'model_has_roles.model_id')
                    ->where('model_has_roles.model_type', User::class);
            })
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id');
    }
    public function updateRole($id, $request)
    {
        $res = DB::table($this->table_model_has_roles)
            ->where('model_id', $id)
            ->update(['role_id' => $request->role_id]);
        return $res;
    }
    public function whereCol($nameCol, $compare, $request)
    {
        $res = $this->DB()->where($nameCol, $compare, $request)->where('status', config('util.UN_DROP'));
        return $res;
    }
}
