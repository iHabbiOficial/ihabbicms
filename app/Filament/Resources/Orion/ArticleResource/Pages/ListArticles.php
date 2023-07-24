<?php

namespace App\Filament\Resources\Orion\ArticleResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\LatestResourcesTrait;
use App\Filament\Resources\Orion\ArticleResource;

class ListArticles extends ListRecords
{
    use LatestResourcesTrait;

    protected static string $resource = ArticleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
