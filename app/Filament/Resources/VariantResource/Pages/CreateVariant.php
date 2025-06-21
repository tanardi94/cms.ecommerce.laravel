<?php

namespace App\Filament\Resources\VariantResource\Pages;

use App\Filament\Resources\VariantResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateVariant extends CreateRecord
{
    use \App\Traits\RedirectIndex;
    protected static string $resource = VariantResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $product = Product::findBySku($data['sku']);
        $data['product_id'] = $product->id;
        return static::getModel()::create($data);
    }
}
