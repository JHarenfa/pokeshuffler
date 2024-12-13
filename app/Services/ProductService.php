<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProductService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('MICROSERVICE_PRODUCT_BASE_URL');
    }

    public function getAllProducts($page = 1, $perPage = 5)
    {
        // Send GET request to the .NET API with pagination parameters
        $response = Http::get($this->baseUrl, [
            'page' => $page,
            'perPage' => $perPage
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            // Extract products and total count
            $data = $response->json();
            return [
                'products' => $data['products'],
                'total' => $data['total'],
            ];
        }

        // Return an empty array and zero count in case of failure
        return ['products' => [], 'total' => 0];
    }
}
