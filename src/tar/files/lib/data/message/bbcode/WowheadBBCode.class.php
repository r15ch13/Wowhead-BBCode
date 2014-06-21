<?php
require_once(WCF_DIR.'lib/data/message/bbcode/BBCodeParser.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/BBCode.class.php');

/**
 * @author Richard Kuhnt
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class WowheadBBCode implements BBCode
{
    protected $url = '';
    protected $defaultlang = 'en';

    /**
     * @see BBCode::getParsedTag()
     */
    public function getParsedTag($openingTag, $content, $closingTag, BBCodeParser $parser)
    {
        if(!empty($content))
        {
            // Url ueberpruefen und benoetigte Daten extrahieren
            if(preg_match('/^https?:\/\/(.+?)?\.?(?:wowhead|thottbot|hearthhead)\.com(?:\:\d+)?\/\??(item|quest|spell|achievement|transmog-set|statistic|npc|object|petability|hearthstone\/card|card|hsachievement|cardback|deck|mechanic)=([0-9]+)$/', StringUtil::encodeHtml($content), $matches))
            {
                // nur wenn es vier oder mehr Ergebnisse gibt
                if(count($matches) >= 4)
                {
                    // Daten zur besseren Lesbarkeit in Variablen speichern
                    $url = $matches[0];
                    $lang = $matches[1];
                    $type = $matches[2];
                    $id = $matches[3];

                    $name = $type ." #". $id;
                    $rel = '';

                    // Pruefen ob es einen BBCode Parameter gibt
                    if(!empty($openingTag['attributes'][0]))
                    {
                        // Item Parameter anfuegen
                        $rel = ' rel="' . StringUtil::encodeHtml(trim($openingTag['attributes'][0])) . '"';
                    }

                    // Formatieren Link zurueckgeben
                    return '<a href="'. $url .'"' . $rel . '>'. $name .'</a>';
                }
                else
                {
                    // Unformatieren Link zurueckgeben
                    return '<a href="'. StringUtil::encodeHtml($content) .'">'. StringUtil::encodeHtml($content) .'</a>';
                }
            }
            else
            {
                // Unformatieren Link zurueckgeben
                return '<a href="'. StringUtil::encodeHtml($content) .'">'. StringUtil::encodeHtml($content) .'</a>';
            }
        }
    }
}
