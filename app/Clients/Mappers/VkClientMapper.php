<?php

namespace App\Clients\Mappers;

use App\Clients\Models\Client;

final class VkClientMapper
{
    public static function create(array $response): Client
    {
        return new Client([
            'first_name' => $response['first_name'],
            'last_name' => $response['last_name'],
            'external_id' => $response['id'],
            'photo' => $response['photo_100']
                ? $response['photo_100']
                : null,
            'university_name' => !empty($response['university_name'])
                ? $response['university_name']
                : null,
            'relation' => isset($response['relation'])
                ? $response['relation']
                : null
            ,
            'home_phone' => !empty($response['home_phone'])
                ? $response['home_phone']
                : null,
            'relative_id' => !empty($response['relatives'])
                ? $response['relatives'][0]['id']
                : null,
            'instagram' => !empty($response['instagram'])
                ? 'https://www.instagram.com/'.$response['instagram']
                : null,
            'facebook' => !empty($response['facebook'])
                ? 'https://www.facebook.com/'.$response['facebook']
                : null
        ]);
    }
}
