<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $fillable = ['kh_id', 'content', 'publish_content', 'status'];
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
        $publish_content = $request->has('publish_content') ? $request->publish_content : null;
        $query = $this->joinUser();
        if ($softDelete != null) {
            $query->where($this->table . '.status', '=', config('util.IN_DROP'));
        } else {
            $query->where($this->table . '.status', '=',  config('util.UN_DROP'));
        }
        if ($publish_content != null) {
            $query->where($this->table . '.publish_content', '=', $publish_content);
        }
        if ($sortBy == "desc") {
            $query->orderByDesc($orderBy);
        } else {
            $query->orderBy($orderBy);
        }
        return $query;
    }
    public function index($request)
    {
        return  $this->getList($request)->paginate(request('limit') ?? 10);
    }
    public function joinUser()
    {
        return $this->DB()->select(['feedback.*', 'users.id as uId', 'users.name as uName', 'users.email as uEmail', 'users.image as uImage'])
            ->join('users', 'feedback.kh_id', '=', 'users.id');
    }
    public function getAll()
    {
        $query = DB::table($this->table)->where('status', '=', config('util.UN_DROP'));
        return $query;
    }
    public function store($request)
    {
        // $method_route = 'router_BackEnd_User_Add';
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = array_map(function ($item) {
                if ($item == '') {
                    $item == null;
                }
                if (is_string($item)) {
                    $item = trim($item);
                }
                return $item;
            }, $request->post());
            unset($params['cols']['_token']);
            $params['cols']['created_at'] = \Carbon\Carbon::now(); # \Datetime() ]
            $res = $this->DB()->insert($params['cols']);
            return $res;
        }
    }
    public function edit($request)
    {

        $params = [];
        $params['cols'] = array_map(function ($item) {
            if ($item == '') {
                $item == null;
            }
            if (is_string($item)) {
                $item = trim($item);
            }
            return $item;
        }, $request->all());
        unset($params['cols']['_token']);
        unset($params['cols']['_method']);
        $params['cols']['updated_at'] = \Carbon\Carbon::now();
        $res =  DB::table($this->table)
            ->where('id', $request->id)
            ->update($params['cols']);
        return $res;
    }
    public function find($id)
    {

        $query = DB::table($this->table)->find($id);
        return $query;
    }
    public function drop($id)
    {
        $res =  DB::table($this->table)
            ->where('id', $id)
            ->update(['status' => config('util.IN_DROP')]);
        return $res;
    }
    public function backUp($id)
    {
        $res =  DB::table($this->table)
            ->where('id', $id)
            ->update(['status' => config('util.UN_DROP')]);
        return $res;
    }
}
