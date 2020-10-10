<?php

namespace App\Form\DataTransformer;

use App\Utils\DurationUtils;
use Symfony\Component\Form\DataTransformerInterface;

class DateIntervalArrayToSecondTransformer implements DataTransformerInterface
{
    public function transform($value)
    {
        if ($value === null){
            return [
                'hours' => 0,
                'minutes' => 0,
                'seconds' => 0,
            ];
        }
        $value = explode(':', date('H:i:s', $value));

        return [
            'hours' => (int) $value[0],
            'minutes' => (int) $value[1],
            'seconds' => (int) $value[2],
        ];
    }

    public function reverseTransform($value)
    {
        if ($value === null){
            return 0;
        }

        $value = DurationUtils::convertToSecond($value);

        return $value;
    }
}
