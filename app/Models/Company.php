<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Company extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'address_line_1',
        'city',
        'state',
        'postal_code',
        'country',
        'invoice_prefix',
        'invoice_next_number',
        'currency',
        'default_tax_rate',
    ];

    protected static function boot(): void
    {
        parent::boot();

        // Auto-generate slug from name
        static::creating(function (Company $company) {
            if (empty($company->slug)) {
                $company->slug = Str::slug($company->name);
            }
        });
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Generate next invoice number like "INV-00001"
     */
    public function generateInvoiceNumber(): string
    {
        $number = $this->invoice_next_number;
        $this->increment('invoice_next_number');

        return $this->invoice_prefix . '-' . str_pad($number, 5, '0', STR_PAD_LEFT);
    }
}