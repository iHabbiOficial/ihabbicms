<?php

namespace App\Filament\Resources\User\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use App\Services\RconService;
use Filament\Resources\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Tables\Columns\HabboBadgeColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Traits\LatestRelationResourcesTrait;
use App\Filament\Traits\TranslatableResource;
use Filament\Resources\RelationManagers\RelationManager;

class BadgesRelationManager extends RelationManager
{
    use LatestRelationResourcesTrait, TranslatableResource;

    protected static string $relationship = 'badges';

    protected static ?string $recordTitleAttribute = 'badge_code';

    protected static ?string $translateIdentifier = 'badges';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('badge_code')
                    ->label(__('filament::resources.inputs.badge_code'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('filament::resources.columns.id')),

                HabboBadgeColumn::make('badge')
                    ->label(__('filament::resources.columns.image')),

                TextColumn::make('badge_code')
                    ->label(__('filament::resources.columns.badge_code'))
                    ->searchable(),

                IconColumn::make('slot_id')
                    ->label(__('filament::resources.columns.equipped'))
                    ->options([
                        'heroicon-o-check-circle' => fn (string $state) => $state > 0,
                        'heroicon-o-x-circle' => fn (string $state) => $state <= 0,
                    ])
                    ->colors([
                        'success' => fn (string $state) => $state > 0,
                        'danger' => fn (string $state) => $state <= 0,
                    ]),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->before(function (CreateAction $action, RelationManager $livewire): void {
                        $user = $livewire->getOwnerRecord();
                        $hasRconEnabled = config('hotel.rcon.enabled');

                        if (!$user->online) return;

                        if (!$hasRconEnabled) {
                            Notification::make()
                                ->danger()
                                ->title('RCON is not enabled!')
                                ->body("You can't send badges to online users if RCON is not enabled.")
                                ->persistent()
                                ->send();
                        } else {
                            $rcon = app(RconService::class);
                            $data = $action->getFormData();

                            $rcon->sendSafelyFromDashboard('sendBadge', [$user, $data['badge_code']], 'RCON: Failed to send the badge');
                        }

                        $action->cancel();
                    }),
            ])
            ->actions([
                DeleteAction::make()
                    ->before(fn (DeleteAction $action, RelationManager $livewire) => self::onDeleteBadgeAction($action, $livewire)),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
                    ->before(fn (DeleteBulkAction $action, RelationManager $livewire) => self::onDeleteBadgeAction($action, $livewire)),
            ]);
    }

    public static function onDeleteBadgeAction(DeleteAction|DeleteBulkAction $action, RelationManager $livewire): void
    {
        $user = $livewire->getOwnerRecord();
        $hasRconEnabled = config('hotel.rcon.enabled');

        if (!$user->online) return;

        if (!$hasRconEnabled) {
            Notification::make()
                ->danger()
                ->title('RCON is not enabled!')
                ->body("You can't remove badges to online users if RCON is not enabled.")
                ->persistent()
                ->send();
        } else {
            $rcon = app(RconService::class);
            $badge = $action instanceof DeleteAction
                ? $action->getRecord()?->badge_code
                : $action->getRecords()->map(fn ($record) => $record->badge_code)->join(';');

            $rcon->sendSafelyFromDashboard('removeBadge', [$user, $badge], 'RCON: Failed to remove the badge');
        }

        $action->cancel();
    }
}
