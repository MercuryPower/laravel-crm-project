<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    private $statusArray = [
        'defect'=>'Брак',
        'liquid'=>'Ликвид',
        'default'=>'Не обработан',
    ];

    public function getStatus()
    {
        return $this->statusArray[$this->status];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }
}
