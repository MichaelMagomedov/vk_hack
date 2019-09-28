<?php

namespace App\Nova\Resources;

use App\Nova\Utils\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class Answer extends Resource
{

    public static $model = \App\Test\Models\Answer::class;

    public static $title = 'text';

    public static $displayInNavigation = false;

    public static function label()
    {
        return 'Ответы';
    }

    public static $search = ['text'];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Ответ', 'text')->rules('required'),
            BelongsTo::make('Вопрос', 'question', Question::class)->rules('required'),
            BelongsTo::make('Следующий вопрос', 'nextQuestion', Question::class)->nullable(),
            BelongsToMany::make('Банковские продукты', 'products', Product::class),
        ];
    }
}
