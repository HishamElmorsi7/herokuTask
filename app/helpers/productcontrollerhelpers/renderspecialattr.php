<?php
namespace Task\Helpers\ProductControllerHelpers;

trait RenderSpecialAttr
{
    private function renderSpecialAttrOfDVD($product)
    {
        $handledSizeAttr = $product['size'];
        $toBerRenderedSpecialAttr =  'Size: ' . $handledSizeAttr . ' MB';

        return $toBerRenderedSpecialAttr;
    }

    private function renderSpecialAttrOfBook($product)
    {
        $handledWeightAttr = $product['weight'];
        $toBerRenderedSpecialAttr =  'Weight: ' . $handledWeightAttr . ' KG';

        return $toBerRenderedSpecialAttr;
    }


    private function renderSpecialAttrOfFurniture($product)
    {
        $handledWidthAttr  = $product['width'];
        $handledLengthAttr = $product['length'];
        $handledHeightAttr = $product['height'];
        // showing furniture dimensions in form width x length x height
        $toBerRenderedSpecialAttr =  'Dimensions: '. $handledWidthAttr .'x'. $handledLengthAttr . 'x' . $handledHeightAttr;

        return $toBerRenderedSpecialAttr;
    }

    private function renderSpecialAttr($product)
    {
        $renderingMethodName = $this -> renderingMethodName($product);
        $toBerRenderedSpecialAttr = $this -> $renderingMethodName($product);

        return $toBerRenderedSpecialAttr;
    }


    private function renderingMethodName($product)
    {
        $renderingMethodFirstHalfName = 'renderSpecialAttrOf';
        $renderingMethodLastHalfName = $product['type'];
        $renderingMethodName = $renderingMethodFirstHalfName . $renderingMethodLastHalfName;

        return $renderingMethodName;
    }

    private function idsWithToBeRenderedSpecialAttrs($products)
    {
        $idsWithToBeRenderedSpecialAttrs = [];

        foreach ($products as $product) {
            $id = $product['item_id'];
            $toBeRenderedSpecialAttr = $this->renderSpecialAttr($product);

            $idsWithToBeRenderedSpecialAttrs[$id] = $toBeRenderedSpecialAttr;
        }

        return $idsWithToBeRenderedSpecialAttrs;
    }
}
