<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['name', 'image', 'status', 'describe', 'price'];
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
        $query = $this->DB()
            ->where('name', 'like', '%' . $q . '%');
        if ($softDelete != null) {
            $query->where('status', '=', config('util.IN_DROP'));
        } else {
            $query->where('status', '=',  config('util.UN_DROP'));
        }
        if ($sortBy == "desc") {
            $query->orderByDesc($orderBy);
        } else {
            $query->orderBy($orderBy);
        }
        return $query;
    }
    public function getAll()
    {
        $query = $this->DB()->where('status', '=',  config('util.UN_DROP'))->get();
        return $query;
    }
    public function index($request)
    {
        return  $this->getList($request)->paginate(request('limit') ?? 10);
    }
    public function store($request)
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
        }, $request->post());
        unset($params['cols']['_token']);
        $params['cols']['created_at'] = \Carbon\Carbon::now(); # \Datetime() ]
        if ($request->file('image')) {
            $file = $request->image;
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);
            $params['cols']['image'] = $filename;
        }
        $res = $this->DB()->insert($params['cols']);

        return $res;
    }
    public function edit($request, $id = null)
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
        if ($request->file('image')) {

            $file = $request->image;

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);
            $params['cols']['image'] = $filename;
        }
        unset($params['cols']['_token']);
        unset($params['cols']['_method']);
        $params['cols']['updated_at'] = \Carbon\Carbon::now();
        $res =  $this->DB()
            ->where('id', $id)
            ->update($params['cols']);
        return $res;
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
    public function whereCol($nameCol, $compare, $request)
    {
        $res = $this->DB()->where($nameCol, $compare, $request)->where('status', config('util.UN_DROP'))->get();
        return $res;
    }
    // where nhiều điều kiện
    public function whereCols($data)
    {
        $res = $this->DB()->where($data)->get();
        return $res;
    }
}
