<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Summarizers\Sum;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                DatePicker::make('booking_date')
                    ->label('Tanggal Kunjungan')
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending Pembayaran',
                        'paid' => 'Sudah Dibayar',
                        'cancelled' => 'Dibatalkan',
                        'completed' => 'Selesai Dikunjungi',
                    ])
                    ->required()
                    ->default('pending'),
                Forms\Components\FileUpload::make('payment_proof')
                    ->label('Bukti Transfer')
                    ->directory('payment-proofs')
                    ->disk('public')
                    ->visibility('public')
                    ->nullable(),
                TextInput::make('total_price')
                    ->label('Total Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->disabled()
                    ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('booking_date')
                    ->label('Tanggal Kunjungan')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'cancelled' => 'danger',
                        'completed' => 'primary',
                        'awaiting_confirmation' => 'info',
                        default => 'secondary',
                    })
                    ->sortable(),
                TextColumn::make('total_price')
                    ->label('Total Harga')
                    ->money('IDR')
                    ->sortable()
                    ->summarize(Sum::make()->label('Total')),
                TextColumn::make('created_at')
                    ->label('Tanggal Pesan')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending Pembayaran',
                        'paid' => 'Sudah Dibayar',
                        'cancelled' => 'Dibatalkan',
                        'completed' => 'Selesai Dikunjungi',
                    ])
                    ->label('Filter Status'),

                Tables\Filters\Filter::make('booking_date')
                    ->form([
                        DatePicker::make('booking_date_from')->label('Dari Tanggal'),
                        DatePicker::make('booking_date_to')->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['booking_date_from'], fn(Builder $query, $date): Builder => $query->whereDate('booking_date', '>=', $date))
                            ->when($data['booking_date_to'], fn(Builder $query, $date): Builder => $query->whereDate('booking_date', '<=', $date));
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('confirmPayment')
                    ->label('Konfirmasi Pembayaran')
                    ->requiresConfirmation()
                    ->hidden(fn($record) => $record->status !== 'pending')
                    ->action(function ($record) {
                        $record->update(['status' => 'paid']);
                        // Kirim notifikasi ke user, dll.
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
