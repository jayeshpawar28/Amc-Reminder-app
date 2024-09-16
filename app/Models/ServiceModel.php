<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'service_pk';
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'customer_fk', 'customer_pk');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_fk', 'product_pk');
    }


    protected $fillable = [
        'service_date', 
        'customer_fk', 
        'product_fk',
    ];
}
