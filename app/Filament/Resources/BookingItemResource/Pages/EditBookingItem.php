<?php

namespace App\Filament\Resources\BookingItemResource\Pages;

use App\Filament\Resources\BookingItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookingItem extends EditRecord
{
    protected static string $resource = BookingItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
