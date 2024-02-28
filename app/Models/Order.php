<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Order extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['date'] - string - contains the product name
     * $this->attributes['total'] - int - contains the product price
    */

    protected $fillable = ['date','total'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }

    public function getDate(): DateTime
    {
        $date = new DateTime($this->attributes['date']);
        return $date;
    }

    public function setDate($date) : void
    {
        $this->attributes['date'] = $date;
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function setTotal($total) : void
    {
        $this->attributes['total'] = $total;
    }

}
