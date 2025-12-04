<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'client_id',
        'invoice_number',
        'status',
        'issue_date',
        'due_date',
        'sent_at',
        'paid_at',
        'currency',
        'subtotal',
        'tax_rate',
        'tax_amount',
        'total',
        'notes',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'sent_at' => 'datetime',
        'paid_at' => 'datetime',
        'subtotal' => 'integer',
        'tax_amount' => 'integer',
        'total' => 'integer',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function lines(): HasMany
    {
        return $this->hasMany(InvoiceLine::class)->orderBy('sort_order');
    }

    /**
     * Format cents to dollars
     */
    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format($this->total / 100, 2);
    }

    /**
     * Check if overdue
     */
    public function getIsOverdueAttribute(): bool
    {
        return $this->status !== 'paid' && $this->due_date->isPast();
    }
}