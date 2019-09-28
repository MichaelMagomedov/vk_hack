<?php

namespace App\Nova\Resources;

use App\Nova\Utils\Resource;
use App\Test\Enums\QuestionTypesEnum;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;

class Question extends Resource
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
            Select::make('Тип ответа', 'type')->options(QuestionTypesEnum::$lables)
                ->showOnIndex(false)
                ->rules('required'),
            Image::make('Картинка вопроса', 'img'),
            BelongsTo::make('Тест', 'test', Test::class),
            BelongsTo::make('Предыдущий вопрос', 'parentQuestion', Question::class)
                ->nullable(),
            HasMany::make('Возмоные ответ', 'answers', Answer::class),
            BelongsToMany::make('Банковские продукты', 'products', Product::class),

        ];
    }
}