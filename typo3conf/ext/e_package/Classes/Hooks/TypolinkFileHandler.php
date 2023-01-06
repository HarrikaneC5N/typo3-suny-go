<?php
namespace Emagineurs\EPackage\Hooks;

class TypolinkFileHandler
{
    /**
     * @param array $params
     * @param \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer $parentObject
     */
    public function wrapFileLink($params, $parentObject)
    {
        if ($params['linkDetails']['type'] === 'file' && $params['linkDetails']['file'] instanceof \TYPO3\CMS\Core\Resource\File) {
            $sizeLabel = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_fluid.']['_LOCAL_LANG.']['fr.']['viewhelper.format.bytes.units'];
            $sizeLabel = str_replace(',', '| ', $sizeLabel);
            /* @var $file \TYPO3\CMS\Core\Resource\File */
            $file = $params['linkDetails']['file'];
            $ext = strtolower($file->getExtension());
            $size = $parentObject->stdWrap_bytes($file->getSize(), ['bytes.' => ['labels' => $sizeLabel]]);
            $params['linktxt'] .= " ($ext - $size)";
        }
    }
}