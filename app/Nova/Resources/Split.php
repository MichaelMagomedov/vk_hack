<?php

namespace App\Nova\Resources;

use App\Nova\Resource;
use KirschbaumDevelopment\NovaChartjs\NovaChartjs;
use KirschbaumDevelopment\NovaChartjs\RelationshipPanel;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

final class Split extends Resource
{

    public static $model = \App\Test\Models\TestCategory::class;

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }
    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }
    public static function searchable()
    {
        return false;
    }

    public static function label()
    {
        return 'Анализ';
    }
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Категория', 'name')->readOnly(),
            new RelationshipPanel('Split тестирование'),
        ];
    }

}
