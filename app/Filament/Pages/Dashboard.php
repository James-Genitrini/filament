<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends \Filament\Pages\Dashboard
{
    use HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form->schema([
            Section::make("")->schema([
                TextInput::make("name"),
                DatePicker::make("startDate")
                    ->label("Start Date"),
                DatePicker::make("endDate")
                    ->label("End Date"),
            ])->columns(3),
        ]);
            
    }
}