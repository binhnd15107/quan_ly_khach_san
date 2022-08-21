<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = ['room_id', 'name', 'kh_id', 'start_time', 'end_time', 'total_money', 'status', 'id_voucher'];
    private function DB()
    {
        return DB::table($this->table);
    }
    public function getList($request)
    {
        $q = $request->has('q') ? $request->q : "";
        $startTime = $request->has('startTime') ? $request->startTime : null;
        $endTime = $request->has('endTime') ? $request->endTime : null;
        $start_time_room = $request->has('start_time_room') ? $request->start_time_room : null;
        $end_time_room = $request->has('end_time_room') ? $request->end_time_room : null;
        $orderBy = $request->has('orderBy') ? $request->orderBy : 'id';
        $sortBy = $request->has('sortBy') ? $request->sortBy : "desc";
        $softDelete = $request->has('soft_delete') ? $request->soft_delete : null;
        $room_id = $request->has('room_id') ? $request->room_id : null;
        $kh = $request->has('kh_id') ? $request->kh_id : null;
        $query = $this->joinAll()
            ->where($this->table . '.name', 'like', '%' . $q . '%');
        if ($softDelete != null) {
            $query->where($this->table . '.status', '=', config('util.IN_DROP'));
        } else {
            $query->where($this->table . '.status', '=',  config('util.UN_DROP'));
        }
        if ($sortBy == "desc") {
            $query->orderByDesc($orderBy);
        } else {
            $query->orderBy($orderBy);
        }
        if ($room_id != null) {
            $query->whereJsonContains($this->table . '.room_id', $room_id);
        }
        if ($kh != null) {
            $query->where($this->table . '.kh_id',  $kh);
        }
        if ($endTime != null && $startTime != null) {
            // dd($request->endTime);
            $query->where($this->table . '.start_time', '<=', Carbon::parse($endTime)->toDateTimeString())->where($this->table . '.end_time', '>=',  Carbon::parse($startTime)->toDateTimeString());
        }
        if ($start_time_room != null && $end_time_room != null) {
            $query->where($this->table . '.start_time', '<=', $end_time_room)->where($this->table . '.end_time', '>=', $start_time_room);
        }
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
        $params['cols']['room_id'] =  json_encode(array_values([$request->room_id]));
        $params['cols']['name'] = $request->kh_id . date('YmdHi');
        $params['cols']['created_at'] = \Carbon\Carbon::now(); # \Datetime() ]

        $res = $this->DB()->insert($params['cols']);
        return $res;
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
        $res =  $this->DB()
            ->where('id', $request->id)
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
    public function joinAll()
    {
        return $this->DB()->select(['bills.*', 'discount_codes.discount_rate as percent', 'users.id as uId', 'users.name as uName', 'users.email as uEmail'])
            ->join('users', 'bills.kh_id', '=', 'users.id')
            ->leftJoin('discount_codes', 'bills.id_voucher', 'discount_codes.id');
    }
    public function loadArray($data, $arr)
    {
        foreach ($data as $key => $item) {
            $rooms = DB::table('rooms')->select('rooms.*', 'type_rooms.name as  type_rooms_name', 'type_rooms.price as type_rooms_price')
                ->join('type_rooms', 'rooms.type_room_id', '=', 'type_rooms.id')
                ->whereIn('rooms.id', json_decode($item->room_id, true))->get();
            $bill_sevices = DB::table('bill_sevices')
                ->select('bill_sevices.*', 'services.name as svName', 'services.price as svPrice')
                ->join('services', 'bill_sevices.service_id', '=', 'services.id')
                ->where('bill_sevices.bill_id', '=', $item->id)->get();
            $i = json_decode(json_encode($item), True);
            $arr[$key] = $i;
            $arr[$key]['bill_sevices'] = json_decode(json_encode($bill_sevices), True);
            $arr[$key]['rooms'] = json_decode(json_encode($rooms), True);
        }
        return json_decode(json_encode($arr), false);
    }
    public function whereCol($nameCol, $compare, $request)
    {
        $res = $this->DB()->where($nameCol, $compare, $request)->where('status', config('util.UN_DROP'));
        return $res;
    }
    // where nhiều điều kiện
    public function whereCols($data)
    {
        $res = $this->DB()->where($data);
        return $res;
    }
    public function whereJson($data)
    {
        $res = $this->joinAll()
            ->whereJsonContains($this->table . '.room_id', $data)->where($this->table . '.status', config('util.UN_DROP'))->orderByDesc('id');
        return $res;
    }
}
