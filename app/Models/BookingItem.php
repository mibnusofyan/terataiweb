<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'ticket_type_id',
        'quantity',
        'price_per_item',
    ];

    protected $casts = [
        'price_per_item' => 'decimal:2',
    ];

    // Relasi ke Booking
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    // Relasi ke TicketType
    public function ticketType(): BelongsTo
    {
        return $this->belongsTo(TicketType::class);
    }
}