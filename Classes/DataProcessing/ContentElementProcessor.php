<?php
/**
 * Created by PhpStorm.
 * User: programm
 * Date: 06.11.2018
 * Time: 17:00
 */

namespace Miblu\BusinessCasual\DataProcessing;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Class ContentElementProcessor
 * @package Miblu\BusinessCasual\DataProcessing
 */
class ContentElementProcessor implements DataProcessorInterface
{
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData)
    {

        $function = 'processFor' . str_replace(' ', '',
                ucwords(str_replace("_", " ", $contentObjectConfiguration['templateName'])));
        if (strpos($function, 'BusinessCasual/') !== false) {
            $function = str_replace('BusinessCasual/', '', $function);
        };
        if (method_exists($this, $function)) {
            $templateName = $contentObjectConfiguration['templateName'];
            if (strpos($templateName, 'BusinessCasual/') !== false) {
                $templateName = str_replace('BusinessCasual/', '', $templateName);
            };
            $processedData[$templateName] = call_user_func(array(
                $this,
                $function,
            ), $processedData);
        }

        return $processedData;
    }

    public function processForBullets($processedData)
    {
        //@TODO not the best way, try it with IRRE
        $date = new \DateTime();
        $gerDate = strftime('%A', $date->getTimestamp());
        $intDate = $date->format('l');

        if ($processedData['data']['bullets_type'] === 10) {
            foreach ($processedData['bullets'] as $key => $bullet) {
                if (strpos($bullet, $gerDate) !== false || strpos($bullet, $intDate) !== false) {
                    $processedData['bullets'][$key] = $bullet;
                    $processedData['key'] = $key;
                } else {
                    $processedData['bullets'][$key] = $bullet;
                }
            }
        }
        return $processedData;
    }
}