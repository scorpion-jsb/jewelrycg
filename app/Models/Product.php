<?php

namespace App\Models;

use App\Models\Traits\FormatPrices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, FormatPrices;

    public static $category_list = [
        'Arts',
        'Automotive',
        'Baby',
        'Beauty & Personal Care',
        'Books',
        "Boy's Fashion",
        'Computers',
        'Digital Music',
        'Electronics',
        "Girls' Fashion",
        'Health & Household',
        'Home & Kitchen',
        'Industrial & Scientific',
        'Luggage',
        "Men's Fashion",
        'Movies & TV',
        'Music, CDs & Vinyl',
        'Pet Supplies',
        'Software',
        'Sports & Outdoors',
        'Tools & Home Improvement',
        'Toys & Games',
        'Video Games',
        "Women's Fashion"        
    ];

    protected $fillable = [
        'price',
        'desc',
        'name',
        'category',
        'qty'
    ];

    public static function getPriceInCents(float $price)
    {
        $price *= 100;
        return (int) $price;
    }

    public static function stringPriceToCents(string $price)
    {
        $price = str_replace('.', '', $price);
        $price = str_replace(',', '', $price);
        return (int) $price;
    }

    public function replaceImagesIfExist(array|null $images)
    {
        if($images)
        {
            $this->images()->delete();
            Storage::deleteDirectory($this->id);

            $images = collect($images)->map(fn($i) => [
                'path' => 'storage/'.$i->store($this->id)
            ]);

            $this->images()->createMany($images->toArray());
        }
    }

    public function storeImages(array $images)
    {
        $images = collect($images)->map(fn($i, $k) => [
            'path' => 'storage/'.$i->store($this->id)
        ]);
        
        $this->images()->createMany($images->toArray());
    }

    public function deleteImagesInStorage()
    {
        Storage::deleteDirectory($this->id);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'id_product')->orderBy('id', 'asc');
    }
}
