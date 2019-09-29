<?php

namespace App\Test\Models;

use App\Clients\Models\ClientProduct;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaChartjs\Contracts\Chartable;
use KirschbaumDevelopment\NovaChartjs\Traits\HasChart;

final class TestCategory extends Model implements Chartable
{
    use HasChart;

    private static function getParamsForChart(): array
    {
        $params = [];
        for ($i = -10; $i < 10; $i++) {
            $day = Carbon::now();
            $day->addDays($i);
            $params[] = $day->month . "/" . $day->day;
        }
        return $params;
    }

    public static function getNovaChartjsSettings(): array
    {

        return [
            'type' => 'line',
            'height' => 300,
            'options' => ['responsive' => true, 'maintainAspectRatio' => false],
            'parameters' => static::getParamsForChart()
        ];
    }

    /**
     * Return a list of additional datasets added to chart
     *
     * @return array
     */
    public function getAdditionalDatasets(): array
    {
        $categoryId = $this->id;
        $products = Product::whereHas('answers.question.test.category', function ($builder) use ($categoryId) {
            $builder->whereId($categoryId);
        })->with([
            'clientProducts' => function ($q) {
                $q->orderBy('created_at', 'ASC');
            }
        ])->get();
        $data = [];
        /** @var Product $product */
        foreach ($products as $product) {

            $addedLine = [
                'label' => $product->name,
                'borderColor' => sprintf('#%06X', mt_rand(0, 0xFFFFFF)),
                'data' => static::getParamsForChart(),
            ];

            for ($i = 0; $i < 20; $i++) {
                $addedLine['data'][$i] = 0;
            };

            /** @var ClientProduct $clientProduct */
            foreach ($product->clientProducts as $clientProduct) {
                /** @var Carbon $dayNumber */
                $dayNumber = $clientProduct->created_at;
                $date = $dayNumber->month . "/" . $dayNumber->day;
                $dataIndex = array_search($date, array_keys($addedLine['data']));
                if ($dataIndex !== false) {
                    $addedLine['data'][$dataIndex] += 1;
                }
            }
            $data[] = $addedLine;
        }
        return $data;
    }


    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function tests()
    {
        return $this->hasMany(Test::class, 'category_id');
    }
}
