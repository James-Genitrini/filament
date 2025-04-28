<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\AuthorsRelationManager;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    public static function form(Form $form): Form
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

                    Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->required(),
                    
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
                    //         ->label('Co-authors')
                    //         ->relationship('authors', 'name')
                    //         ->multiple()
                    //         ->preload()
                    //         ->searchable()
                    //         ->label('Authors')
                    //         ->placeholder('Select authors')
                    //         ->columnSpan(2),
                    // ])
                    
                ])
                
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('thumbnail')
                    ->toggleable(),
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ColorColumn::make('color')
                    ->label('Color')
                    ->toggleable(),
                TextColumn::make('tags')
                    ->label('Tags')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                CheckboxColumn::make('published')
                    ->label('Published')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Published At')
                    ->dateTime()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            AuthorsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
