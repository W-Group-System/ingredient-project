<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\DB;

class IngredientGroupItem extends Model
{
     protected $connection = 'mysql';
     protected $table = 'ingredient_group_items';

     public function ingredientGroup()
    {
        return $this->belongsTo(IngredientGroup::class, 'group_id', 'id');
    }

    public function oivl()
    {
        return $this->hasMany(OIVL::class, 'ItemCode', 'item_code');
    }
    public function oprq()
     {
        return $this->hasManyThrough(
            OPRQ::class, 
            PRQ1::class, 
            'ItemCode', 
            'DocEntry', 
            'item_code', 
            'DocEntry' 
        )->where('PRQ1.ItemCode', '=', $this->item_code)
        ->where('PRQ1.TargetType', '=', '22')
        ->where(function ($query) {
            $query->where('DocStatus', '!=', 'C')
                  ->orWhere(function ($q) {
                      $q->where('DocStatus', 'C')
                        ->whereHas('por', function ($porQuery) {
                            $porQuery->where('DocStatus', 'O');
                        });
                  });
        });
     }    
     public function advancePr()
     {
        return $this->hasMany(AdvancePurchaseRequest::class, 'item_code', 'item_code')
            ->whereHas('pos'); 
     }

    public function getParentProducts($itemCode)
    {
        $apiUrl = 'https://crms-wgroup.wsystem.online/api/get-products';
        $client = new Client();

        try {
            $response = $client->request('GET', $apiUrl);
            $products = json_decode($response->getBody()->getContents(), true);

            $matchingProducts = [];
            foreach ($products as $product) {
                if (isset($product['material_name'])) {
                    $materials = [];

                    foreach ($product['material_name'] as $material) {
                        preg_match('/- (\d+)%/', $material, $matches);
                        $percentage = isset($matches[1]) ? (float)$matches[1] / 100 : 1;

                        $cleanMaterial = preg_replace('/- \d+%/', '', $material);
                        $cleanMaterial = trim($cleanMaterial);

                        if (stripos(str_replace(' ', '', $cleanMaterial), str_replace(' ', '', $itemCode)) !== false) {
                            $materials[] = [
                                'name' => $cleanMaterial,
                                'percentage' => $percentage
                            ];
                        }
                    }

                    if (!empty($materials)) {
                        $matchingProducts[] = [
                            'product' => $product['product'],
                            'materials' => $materials
                        ];
                    }
                }
            }

            return $matchingProducts;

        } catch (\Exception $e) {
            return [];
        }
    }


    // public function getAllocatedOrdersAttribute()
    // {
    //     $parentProducts = $this->getParentProducts($this->description);

    //     $directDocEntries = RDR1::where('ItemCode', $this->item_code)
    //         ->pluck('DocEntry')
    //         ->toArray();

    //     $parentDocEntries = [];
    //     if (!empty($parentProducts)) {
    //         $parentDocEntries = RDR1::where(function ($query) use ($parentProducts) {
    //             foreach ($parentProducts as $product) {
    //                 $query->orWhere('Dscription', 'LIKE', "%{$product}%");
    //             }
    //         })->pluck('DocEntry')->toArray();
    //     }

    //     $docEntries = (array_merge($directDocEntries, $parentDocEntries));

    //     $orders = collect();

    // if (!empty($docEntries)) {
    //     foreach (array_chunk($docEntries, 2000) as $chunk) {
    //         $result = ORDR::whereIn('DocEntry', $chunk)
    //             ->whereDoesntHave('productionOrders', function ($query) {
    //                 $query->where('Status', 'L');
    //             })
    //             ->get();

    //         $rdr1Items = RDR1::whereIn('DocEntry', $chunk)
    //             ->whereIn('WhsCode', ['CAR', 'CAR2'])
    //             ->get()
    //             ->groupBy('DocEntry'); 

    //         $result->each(function ($order) use ($rdr1Items) {
    //             $order->setRelation('rdr1', $rdr1Items->get($order->DocEntry, collect())); 
    //         });

    //         $orders = $orders->merge($result);
    //     }
    // }

    // return $orders;

    // }


    // Original
    // public function getAllocatedOrders($startDate, $endDate)
    // {
    //     $parentProducts = $this->getParentProducts($this->description);

    //     $directDocEntries = RDR1::where('ItemCode', $this->item_code)
    //         ->pluck('DocEntry')
    //         ->toArray();

    //     $parentDocEntries = [];
    //     $productMaterials = []; 

    //     if (!empty($parentProducts)) {
    //         foreach ($parentProducts as $product) {
    //             $parentDocEntries = array_merge(
    //                 $parentDocEntries,
    //                 RDR1::where('Dscription', 'LIKE', "%{$product['product']}%")
    //                     ->pluck('DocEntry')
    //                     ->toArray()
    //             );

    //             $productMaterials[$product['product']] = $product['materials']; 
    //         }
    //     }

    //     $docEntries = array_unique(array_merge($directDocEntries, $parentDocEntries));

    //     $orders = collect();
    //     if (!empty($docEntries)) {
    //         foreach (array_chunk($docEntries, 2000) as $chunk) {
    //             $result = ORDR::whereIn('DocEntry', $chunk)
    //                 ->whereBetween('DocDueDate', [$startDate, $endDate])
    //                 ->whereDoesntHave('productionOrders', function ($query) {
    //                     $query->where('Status', 'L');
    //                 })
    //                 ->get();

    //             $rdr1Items = RDR1::whereIn('DocEntry', $chunk)
    //                 ->whereIn('WhsCode', ['CAR', 'CAR2'])
    //                 ->get()
    //                 ->map(function ($rdr1) use ($productMaterials) {
    //                     // Attach material_name and percentage
    //                     foreach ($productMaterials as $product => $materials) {
    //                         if (stripos($rdr1->Dscription, $product) !== false) {
    //                             $rdr1->materials = $materials;
    //                             break;
    //                         }
    //                     }
    //                     return $rdr1;
    //                 })
    //                 ->groupBy('DocEntry');

    //                 $result = $result->filter(function ($order) {
    //                     return stripos($order->U_PlaceLoading, 'Philippines') !== false;
    //                 });
                    
    //                 $result->each(function ($order) use ($rdr1Items) {
    //                     $order->setRelation('rdr1', $rdr1Items->get($order->DocEntry, collect()));
    //                 });

    //             $orders = $orders->merge($result);
    //         }
    //     }

    //     return $orders;
    // }
    public function getAllocatedOrders($startDate, $endDate)
    
    {
        $parentProducts = $this->getParentProducts($this->description);
        $productMaterials = [];

        $rdr1Query = RDR1::query();

        $rdr1Query->orWhere('ItemCode', $this->item_code);

        foreach ($parentProducts as $product) {
            // $rdr1Query->orWhere('Dscription', 'LIKE', "%{$product['product']}%");
            $rdr1Query->orWhere('Dscription',  "{$product['product']}");
            $productMaterials[$product['product']] = $product['materials'];
        }

        $rdr1Records = $rdr1Query->whereIn('WhsCode', ['CAR', 'CAR2'])->get();

        $docEntries = $rdr1Records->pluck('DocEntry')->unique()->toArray();

        $orders = collect();
        if (!empty($docEntries)) {
            foreach (array_chunk($docEntries, 2000) as $chunk) {
                $result = ORDR::whereIn('DocEntry', $chunk)
                    ->whereBetween('DocDueDate', [$startDate, $endDate])
                    ->where('NumAtCard', 'NOT LIKE', '%MRDC%')
                    ->where('U_PlaceLoading', 'LIKE', '%Philippines%')
                    ->whereDoesntHave('productionOrders', function ($query) {
                        $query->where('Status', 'L');
                    })
                    ->get();

                $rdr1Items = $rdr1Records
                    ->whereIn('DocEntry', $chunk)
                    ->map(function ($rdr1) use ($productMaterials) {
                        $normalizedDescription = strtoupper(str_replace(' ', '', $rdr1->Dscription));
                        foreach ($productMaterials as $product => $materials) {
                            $normalizedProduct = strtoupper(str_replace(' ', '', $product));
                
                            if ($normalizedDescription === $normalizedProduct) {
                                $rdr1->materials = $materials;
                                break;
                            }
                        }
                        return $rdr1;
                    })
                    ->groupBy('DocEntry');

                $result->each(function ($order) use ($rdr1Items) {
                    $order->setRelation('rdr1', $rdr1Items->get($order->DocEntry, collect()));
                });

                $result->each(function ($order) {
                    $order->type = 'sap';
                });

                $orders = $orders->merge($result);
            }
        }

        $productCodes = array_column($parentProducts, 'product');

        $reservedOrders = Ingredient::whereBetween('load_date', [$startDate, $endDate])
        ->where(function ($query) use ($productCodes) {
            foreach ($productCodes as $code) {
                $normalizedCode = str_replace([' ', '-'], '', $code);
                $query->orWhereRaw("REPLACE(REPLACE(product_code, '-', ''), ' ', '') LIKE ?", ["%$normalizedCode%"]);
            }
        })
        ->get();

        $reservedOrders->each(function ($order) use ($productMaterials) {
            foreach ($productMaterials as $product => $materials) {
                $normalizedCode = str_replace([' ', '-'], '', $product);
                $normalizedOrderCode = str_replace([' ', '-'], '', $order->product_code);
                if (stripos($normalizedOrderCode, $normalizedCode) !== false) {
                    $order->materials = $materials;
                    break;
                }
            }
            $order->type = 'reserved';
        });

        $orders = $orders->merge($reservedOrders);

        return $orders;
    }



}
