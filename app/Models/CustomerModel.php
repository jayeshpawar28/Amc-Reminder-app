<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'customer_pk';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_fk', 'product_pk');
    }

    public function services()
    {
        return $this->hasMany(ServiceModel::class, 'customer_fk', 'customer_pk');
    }



    protected $fillable = [
        'customer_name',
        'mobile',
        'address',
        'email',
        'product_fk',
        'start_date',
        'service_frequency',
        'warranty_year',
        'end_date',
        'product_amount',
        'product_remark',
    ];
    
}
