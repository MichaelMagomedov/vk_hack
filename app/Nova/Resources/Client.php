<?php

namespace App\Nova\Resources;

use App\Nova\Utils\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;

class Client extends Resource
{

    public static $model = \App\Clients\Models\Client::class;

    public static $title = 'first_name';

    public static function label()
    {
        return 'Клиенты прошежшие тесты';
    }

    public static $search = ['first_name'];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Image::make('Фото', 'photo')
                ->showOnIndex(false),
            Text::make('Id в вк', 'external_id'),
            Text::make('Имя', 'first_name'),
            Text::make('Фамилия', 'last_name'),
            Text::make('Университет', 'university_name')
                ->showOnIndex(false),
            Text::make('Семейное положение', 'relation')
                ->showOnIndex(false),
            Text::make('Мобильный телефон', 'mobile_phone'),
            Text::make('Домашний телефон', 'home_phone')
                ->showOnIndex(false),
            Text::make('Ближайший родственник', 'relative_id')
                ->showOnIndex(false),
            Text::make('Facebook', 'facebook'),
            Text::make('Instagram', 'instagram'),
        ];
    }
}
