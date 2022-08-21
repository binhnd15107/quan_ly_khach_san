<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class billSevice extends Model
{
    use HasFactory;
    protected $table = 'bill_sevices';
    protected $fillable = ['bill_id', 'service_id', 'total_many', 'amount', 'status'];
    private function DB()
    {
        return DB::table($this->table);
    }
    public function insertOrUpdate($request)
    {
        $service = new service();
        $findService = $service->find($request->service_id);
        $this->DB()->updateOrInsert(
            ['bill_id' => $request->bill_id, 'service_id' => $request->service_id],
            ['amount' =>  DB::raw('amount + ' . 1), 'total_many' => DB::raw('total_many + ' . $findService->price), 'created_at' => Carbon::now()->format('Y-m-d'), 'updated_at' => Carbon::now()->format('Y-m-d')]
        );
        return $findService->price;
    }
    public function whereCols($data)
    {
        $res = $this->DB()->where($data);
        return $res;
    }
    public function whereCol($nameCol, $compare, $request)
    {
        $res = $this->DB()->where($nameCol, $compare, $request)->where('status', config('util.UN_DROP'))->get();
        return $res;
    }
    public function find($id)
    {
        $res = $this->DB()->find($id);
        return $res;
    }
    public function edit()
    {
    }
}
