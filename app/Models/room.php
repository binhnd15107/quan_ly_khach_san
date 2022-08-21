<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $tableTypeRoom = 'type_rooms';
    protected $fillable = ['name', 'describe', 'status', 'current_status', 'type_room_id', 'image', 'images'];
    // private bill $bill;
    public function __construct()
    {
    }
    private function DB()
    {
        return DB::table($this->table);
    }

    public function getList($request, $room_id = null)
    {
        // dd($room_id);
        $q = $request->has('q') ? $request->q : "";
        $typeRoom = $request->has('type_room_id') ? $request->type_room_id : null;
        $orderBy = $request->has('orderBy') ? $request->orderBy : 'id';
        $sortBy = $request->has('sortBy') ? $request->sortBy : "desc";
        $softDelete = $request->has('soft_delete') ? $request->soft_delete : null;
        $query = $this->loadTypeRoom()
            ->where($this->table  . '.name', 'like', '%' . $q . '%');
        if ($softDelete != null) {
            $query->where($this->table  . '.status', '=', config('util.IN_DROP'));
        } else {
            $query->where($this->table  . '.status', '=', config('util.UN_DROP'));
        }
        if ($typeRoom != null) {
            $query->where($this->table  . '.type_room_id', '=', $typeRoom);
        }
        if ($sortBy == "desc") {
            $query->orderByDesc($this->table . '.' . $orderBy);
        } else {
            $query->orderBy($this->table . '.' . $orderBy);
        }
        if (request('max-price') != null || request('min-price') != null) {
            $query->where($this->tableTypeRoom  . '.price', '>=', request('min-price'))->where($this->tableTypeRoom  . '.price', '<=', request('max-price'));
        }
        if ($room_id != null) {
            $query->whereNotIn($this->table . '.id', $room_id);
        }
        return $query;
    }
    public function index($request, $room_id = null)
    {
        return  $this->getList($request, $room_id)->paginate(request('limit') ?? 10);
    }
    public function loadTypeRoom()
    {
        return DB::table($this->table)
            ->join($this->tableTypeRoom, $this->table  . '.type_room_id', '=', $this->tableTypeRoom . '.id')
            ->select($this->table . '.*', $this->tableTypeRoom . '.name as typeRoomName', $this->tableTypeRoom . '.price');
    }
    public function getAll()
    {
        $query = DB::table($this->table)->where($this->table  . '.status', '=', config('util.UN_DROP'))->get();
        return $query;
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
        // $this->loadImage($request, $params);
        if ($request->file('image')) {

            $file = $request->image;

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);
            $params['cols']['image'] = $filename;
        }
        if ($request->hasfile('images')) {

            foreach ($request->file('images') as $image) {
                $name =  date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('assets/img'), $name);
                $data[] = $name;
            }
            $params['cols']['images'] = json_encode($data);
        }
        $res = DB::table($this->table)->insert($params['cols']);

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
        if ($request->hasfile('images')) {

            foreach ($request->file('images') as $image) {
                $name =  date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('assets/img'), $name);
                $data[] = $name;
            }

            // $result = array_diff($request->images, $dataMajorSkill);
            // $dropResult = array_diff($dataMajorSkill, $request->major_id);
            $params['cols']['images'] = json_encode($data);
        }
        unset($params['cols']['_token']);
        unset($params['cols']['_method']);
        $params['cols']['updated_at'] = \Carbon\Carbon::now();
        $res =  DB::table($this->table)
            ->where('id', $id)
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
    public function loadImage($request, $params)
    {
        if ($request->file('image')) {

            $file = $request->image;

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);
            $params['cols']['image'] = $filename;
        }
        if ($request->hasfile('images')) {

            foreach ($request->file('images') as $image) {
                $name =  date('YmdHi') . $image->getClientOriginalName();
                $image->move(public_path('assets/img'), $name);
                $data[] = $name;
            }
            $params['cols']['images'] = json_encode($data);
        }
        return $params;
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
    public function bills($request)
    {
        $request['start_time_room'] = request()->start_time_room == null ? Carbon::now('Asia/Ho_Chi_Minh')->toDateString() :  request()->start_time_room;
        $request['end_time_room'] = request()->end_time_room == null ? Carbon::now('Asia/Ho_Chi_Minh')->addDay()->toDateString() :  request()->end_time_room;
        $bill = new bill();
        $query = $bill->getList($request)->get();

        $arr = [];
        foreach ($query as $q) {
            $arr =  array_unique(array_merge($arr, json_decode($q->room_id, true)));
        }
        return $arr;
    }
}
