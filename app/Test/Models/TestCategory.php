<?php

namespace App\Test\Models;

use App\Clients\Models\ClientProduct;
use Illuminate\Database\Eloquent\Model;
use KirschbaumDevelopment\NovaChartjs\Contracts\Chartable;
use KirschbaumDevelopment\NovaChartjs\Traits\HasChart;

final class TestCategory extends Model implements Chartable
{
    use HasChart;

    public static function getNovaChartjsSettings(): array
    {
        return [
            'type' => 'line',
            'height' => 300,
            'options' => ['responsive' => true, 'maintainAspectRatio' => false],
            'parameters' => range(0, 31)
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
                'data' => array_fill(0, 31, 0),
            ];

            /** @var ClientProduct $clientProduct */
            foreach ($product->clientProducts as $clientProduct) {
                $dayNumber = $clientProduct->created_at->daysInMonth;
                $addedLine['data'][$dayNumber] += 1;
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
