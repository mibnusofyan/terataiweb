<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingItemResource\Pages;
use App\Filament\Resources\BookingItemResource\RelationManagers;
use App\Models\BookingItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Booking;
use App\Models\TicketType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Illuminate\Database\Eloquent\Model;

class BookingItemResource extends Resource
{
    protected static ?string $model = BookingItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('booking_id')
                    ->label('Pesanan')
                    ->relationship('booking', 'id')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('ticket_type_id')
                    ->label('Jenis Tiket')
                    ->relationship('ticketType', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->required()
                    ->default(1)
                    ->minValue(1),
                TextInput::make('price_per_item')
                    ->label('Harga per Item Saat Pesan')
                    ->numeric()
                    ->required()
                    ->prefix('Rp'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('booking.id')
                    ->label('ID Pesanan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ticketType.name')
                    ->label('Jenis Tiket')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Jumlah')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price_per_item')
                    ->label('Harga per Item Saat Pesan')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('subtotal')
                    ->label('Subtotal')
                    ->getStateUsing(fn(Model $record): float => $record->quantity * $record->price_per_item)
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('ticketType')
                    ->relationship('ticketType', 'name')
                    ->label('Jenis Tiket'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Hapus Item Booking')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak dapat diurungkan.')
                    ->modalButton('Ya, Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->modalHeading('Hapus Item Booking Terpilih')
                        ->modalSubheading('Apakah Anda yakin ingin menghapus semua item yang dipilih? Tindakan ini tidak dapat diurungkan.')
                        ->modalButton('Ya, Hapus Semua'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookingItems::route('/'),
            'create' => Pages\CreateBookingItem::route('/create'),
            'edit' => Pages\EditBookingItem::route('/{record}/edit'),
        ];
    }
}
