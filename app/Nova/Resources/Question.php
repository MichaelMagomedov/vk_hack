<?php

namespace App\Nova\Resources;

use App\Nova\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;

final class Question extends Resource
{

    public static $model = \App\Test\Models\Question::class;

    public static $title = 'text';

    public static $displayInNavigation = false;

    public static $search = ['text'];

    public static function label()
    {
        return 'Вопросы';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Textarea::make('Вопрос', 'text')
                ->showOnIndex()
                ->rules('required'),
            Image::make('Картинка вопроса', 'img'),
            Boolean::make('Первый Вопрос', 'is_first')
                ->rules('required'),
            BelongsTo::make('Тест', 'test', Test::class),
            HasMany::make('Возможные ответ', 'answers', Answer::class),
        ];
    }
}
