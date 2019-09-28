<?php

namespace App\Nova\Resources;

use App\Nova\Utils\Resource;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Product extends Resource
{

    public static $model = \App\Test\Models\Product::class;

    public static $title = 'name';

    public static function label()
    {
        return 'Банковские продукты';
    }

    public static $search = ['name'];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->rules('required'),
            Text::make('ссылка', 'url')->rules('required'),
            Textarea::make('Описание', 'desc')->rules('required'),
            Image::make('Фото(превью)', 'img')->rules('required'),
        ];
    }
}
