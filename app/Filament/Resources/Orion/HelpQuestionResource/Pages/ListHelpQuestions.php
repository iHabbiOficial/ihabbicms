<?php

namespace App\Filament\Resources\Orion\HelpQuestionResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\LatestResourcesTrait;
use App\Filament\Resources\Orion\HelpQuestionResource;

class ListHelpQuestions extends ListRecords
{
    use LatestResourcesTrait;

    protected static string $resource = HelpQuestionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
