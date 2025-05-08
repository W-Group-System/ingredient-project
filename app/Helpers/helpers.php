<?php
use App\POR1;

function normalize($string) {
    return strtolower(preg_replace('/[^a-z0-9]/i', '', $string));
}

function normalizeTwo($string) {
    return strtoupper(preg_replace('/[\s\-]/', '', $string));
}


if (!function_exists('getMaterialPercentage')) {
    function getMaterialPercentage($products, $itemCode, $materialDescription)
    {
        $normalizedItemCode = normalize($itemCode);
        $bestMatch = null;
        $bestScore = 0;

        foreach ($products as $product) {
            if (!isset($product['product'], $product['material_name'])) {
                continue;
            }

            $normalizedProduct = normalize($product['product']);

            if ($normalizedItemCode === $normalizedProduct) {
                $bestMatch = $product;
                break; 
            }

            similar_text($normalizedItemCode, $normalizedProduct, $percent);

            if ($percent > $bestScore) {
                $bestScore = $percent;
                $bestMatch = $product;
            }
        }

        if ($bestMatch) {

            foreach ($bestMatch['material_name'] as $material) {
                if (preg_match('/^(.*?)\s*-\s*(\d+(\.\d+)?)%\s*$/', $material, $matches)) {
                    $materialName = trim($matches[1]);
                    $materialPercent = $matches[2];

                    if (normalize($materialName) === normalize($materialDescription)) {
                        return $materialPercent / 100;
                    }
                }
            }
        }

        return null;
    }

    if (!function_exists('getPONumber')) {
        function getPONumber($prLine)
        {
            $poLine = POR1::where('BaseEntry', $prLine->DocEntry)
                ->where('BaseLine', $prLine->LineNum)
                ->where('BaseType', 1470000113)
                ->with('opor') 
                ->first();
    
            if ($poLine && $poLine->opor) {
                return $poLine->opor->DocNum;
            }
    
            return '-';
        }
    }
}
