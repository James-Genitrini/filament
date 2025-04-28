<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Resource;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Post Details')->schema([

                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),
                    
                    ColorPicker::make('color')
                        ->label('Color')
                        ->required()
                        ->default('#000000'),

                    MarkdownEditor::make('content')
                        ->label('Content')
                        ->required()
                        ->columnSpanFull(),
                ])->columnSpan(2)->columns(2),

                Group::make()->schema([
                    Section::make('Image')->collapsible()->schema([
                        FileUpload::make('thumbnail')
                            ->disk('public')
                            ->directory('thumbnails')
                    ])->columnSpan(1),

                        
                    Section::make('Post Options')->schema([
                        TagsInput::make('tags')
                        ->label('Tags')
                        ->required()
                        ->placeholder('Enter tags'),

                        Checkbox::make('published')
                            ->label('Published')
                    ]),

                    // Section::make('Authors')->schema([
                    //     Select::make('authors')
                    //         ->relationship('authors', 'name')
                    //         ->multiple()
                    //         ->preload()
                    //         ->searchable()
                    //         ->label('Authors')
                    //         ->placeholder('Select authors')
                    //         ->columnSpan(2)
                    // ])
                    
                ])
                
        ])->columns(3);

    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\CheckboxColumn::make('published')
                    ->label('Published')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
