<?php
/**
 * Created for IG Monitoring.
 * User: jakim <pawel@jakimowski.info>
 * Date: 17.02.2018
 */

namespace app\components;


class Formatter extends \yii\i18n\Formatter
{
    public function asChange($number, $coloring = true, $format = 'integer')
    {
        if ($number === null) {
            return $this->nullDisplay;
        }
        $value = $this->format($number, $format);

        if ($coloring === false) {
            return sprintf($number > 0 ? '+%s' : '%s', $value);
        }

        return sprintf($number > 0 ? '<span class="text-success">+%s</span>' : '<span class="text-danger">%s</span>', $value);
    }

    public function asPercent($value, $decimals = null, $options = [], $textOptions = [])
    {
        $sign = ArrayHelper::remove($options, 'sign', true);
        $value = parent::asPercent($value, $decimals, $options, $textOptions);
        if (!$sign) {
            $value = substr($value, 0, -1);
        }

        return $value;
    }
}