<?php
/**
 * Created by PhpStorm.
 * User: Sugito
 * Date: 9/9/2016
 * Time: 11:50 PM
 */

namespace App\Model;

use Auth;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\PurchaseOrder
 *
 * @mixin \Eloquent
 */
class PurchaseOrder extends Model
{
    use SoftDeletes;

    protected $table = 'purchase_orders';

    protected $dates = ['deleted_at', 'po_created', 'shipping_date'];

    protected $fillable = [
        'code', 'po_type', 'po_created', 'shipping_date',
        'supplier_type', 'walk_in_supplier', 'walk_in_supplier_detail',
        'remarks', 'status', 'supplier_id', 'vendor_trucking_id', 'warehouse_id',
        'store_id'
    ];

    public function hId() {
        return HashIds::encode($this->attributes['id']);
    }

    public function items(){
        return $this->morphMany('App\Model\Item', 'itemable');
    }

    public function receipts(){
        return  $this->hasManyThrough('App\Model\Receipt', 'App\Model\Item', 'itemable_id', 'item_id', 'id');
    }

    public function payments()
    {
        return $this->belongsToMany('App\Model\Payment', 'purchase_order_payments', 'po_id', 'payment_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Model\Supplier', 'supplier_id');
    }

    public function vendorTrucking()
    {
        return $this->belongsTo('App\Model\VendorTrucking', 'vendor_trucking_id');
    }

    public function store()
    {
        return $this->belongsTo('App\Model\Store', 'store_id');
    }

    public function warehouse()
    {
        return $this->belongsTo('App\Model\Warehouse', 'warehouse_id');
    }

    public function getIdAttribute($value){
        return HashIds::encode($value);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->created_by = $user->id;
                $model->updated_by = $user->id;
            }
        });

        static::updating(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->updated_by = $user->id;
            }
        });

        static::deleting(function($model)
        {
            $user = Auth::user();
            if ($user) {
                $model->deleted_by = $user->id;
                $model->save();
            }
        });
    }
}