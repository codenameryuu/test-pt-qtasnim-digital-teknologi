<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use EloquentFilter\Filterable;

use App\Filters\ProductFilter;
use App\Helpers\FormatterHelper;
use App\Helpers\HashHelper;

use App\Traits\PaginateData;

class Product extends Model
{
    use Filterable, HasFactory, PaginateData, SoftDeletes;

    /*
    |-----------------------------------------------------------------------------
    | DECORATOR(s)
    |-----------------------------------------------------------------------------
    | // ! write your decorator(s) below, to maintain code readability
    */

    /**
     ** The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     ** The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'hash_id',
        'highest_quantity_transaction',
        'lowest_quantity_transaction',
    ];

    /**
     ** The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'productCategory',
    ];

    /*
    |-----------------------------------------------------------------------------
    | HOOK METHOD(s)
    |-----------------------------------------------------------------------------
    | // ! write your hook method(s) below, to maintain code readability
    */

    /**
     ** Model filter.
     *
     * @return string
     */
    public function modelFilter()
    {
        return $this->provideFilter(ProductFilter::class);
    }

    /**
     ** Get hash id attribute.
     *
     * @return string
     */
    public function getHashIdAttribute()
    {
        return HashHelper::encrypt($this->id);
    }

    /**
     ** Get highest quantity transaction attribute.
     *
     * @return string
     */
    public function getHighestQuantityTransactionAttribute()
    {
        $transaction = Transaction::where('product_id', $this->id)
            ->orderBy('quantity', 'desc')
            ->first();

        $quantity = 0;

        if ($transaction) {
            $quantity = $transaction->quantity;
        }

        return $quantity;
    }

    /**
     ** Get lowest quantity transaction attribute.
     *
     * @return string
     */
    public function getLowestQuantityTransactionAttribute()
    {
        $transaction = Transaction::where('product_id', $this->id)
            ->orderBy('quantity', 'asc')
            ->first();

        $quantity = 0;

        if ($transaction) {
            $quantity = $transaction->quantity;
        }

        return $quantity;
    }

    /*
    |-----------------------------------------------------------------------------
    | STATIC METHOD(s)
    | ----------------------------------------------------------------------------
    | // ! write your static method(s) below, to maintain code readability
    */

    /*
    |-----------------------------------------------------------------------------
    | SCOPED METHOD(s)
    | ----------------------------------------------------------------------------
    | // ! write your static method(s) below, to maintain code readability
    */

    /*
    |-----------------------------------------------------------------------------
    | RELATIONAL METHOD(s)
    |-----------------------------------------------------------------------------
    | // ! write your relational method(s) below, to maintain code readability
    */

    /**
     ** Relationship with product category.
     *
     * @return BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id')
            ->withTrashed();
    }
}
