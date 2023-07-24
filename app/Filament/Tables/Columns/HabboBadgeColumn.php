<?php

namespace App\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;
use App\Models\Compositions\HasBadge;

class HabboBadgeColumn extends Column implements HasBadge
{
    protected string $view = 'filament.tables.columns.habbo-badge-column';

    public function getBadgePath(): string
    {
        $record = $this->getRecord();

        if (!method_exists($record, 'getBadgePath')) return '';

        return $record->getBadgePath();
    }

    public function getBadgeName(): string
    {
        $record = $this->getRecord();

        if (!method_exists($record, 'getBadgeName')) return '';

        return $record->getBadgeName();
    }
}
