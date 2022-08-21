<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    private function DB()
    {
        return DB::table($this->table);
    }
    public function getAll()
    {
        $query = $this->DB()->get();
        return $query;
    }
}
