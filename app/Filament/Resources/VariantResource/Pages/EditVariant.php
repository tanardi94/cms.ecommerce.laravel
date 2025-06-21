<?php

namespace App\Filament\Resources\VariantResource\Pages;

use App\Filament\Resources\VariantResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVariant extends EditRecord
{
    use \App\Traits\RedirectIndex;
    protected static string $resource = VariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function beforeSave(): void
    {
        $product = Product::findBySku($this->data['sku']);
        $this->data['product_id'] = $product->id;
    }

    public function mutateFormDataBeforeFill(array $data): array
    {
        $data['sku'] = $this->record->product->sku;
        return $data;
    }
}
