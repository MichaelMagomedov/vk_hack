<?php

namespace App\Nova\Resources;

use App\Nova\Utils\Resource;
use Chaseconey\ExternalImage\ExternalImage;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class Client extends Resource
{

    public static $model = \App\Clients\Models\Client::class;

    public static $title = 'first_name';

    public static function label()
    {
        return 'Клиенты прошедшие тесты';
    }

    public static $search = ['first_name'];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            ExternalImage::make('Фото', 'photo'),
            Text::make('Id в вк', 'external_id'),
            Text::make('Имя', 'first_name'),
            Text::make('Фамилия', 'last_name'),
            Text::make('Университет', 'university_name')
                ->showOnIndex(false),
            Text::make('Семейное положение', 'relation')
                ->showOnIndex(false),
            Text::make('Домашний телефон', 'home_phone')
                ->showOnIndex(false),
            Text::make('Ближайший родственник', 'relative_id')
                ->showOnIndex(false),
            Text::make('Facebook', 'facebook')->showOnIndex(false),
            Text::make('Instagram', 'instagram')->showOnIndex(false),
            BelongsToMany::make('Ответы на вопросы', 'answers', Answer::class),
        ];
    }
}
