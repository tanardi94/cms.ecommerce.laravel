<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Image;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    use \App\Traits\RedirectIndex;
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        dd($data);
        if (isset($data['images'])) {
            // foreach ($data['images'] as $key => $image) {
            //     $ext = $image->getClientOriginalExtension();
            //     $sku = strtolower($data['sku']);
            //     $seq = $key + 1;
            //     $image->storeAs("public/products/{$sku}", "{$sku}_{$seq}.{$ext}");
            //     Image::create([
            //         'product_id' => $data['id'],
            //         'url' => "/products/{$sku}/{$sku}_{$seq}.{$ext}",
            //         'sequence' => $seq,
            //     ]);
            // }
        }
        return $data;
    }

    public function afterCreate(array $data): array
    {
        if (isset($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $ext = $image->getClientOriginalExtension();
                $sku = strtolower($data['sku']);
                $seq = $key + 1;
                $image->storeAs("public/products/{$sku}", "{$sku}_{$seq}.{$ext}");
                Image::create([
                    'product_id' => $data['id'],
                    'url' => "/products/{$sku}/{$sku}_{$seq}.{$ext}",
                    'sequence' => $seq,
                ]);
            }
        }
        return $data;
    }
}
