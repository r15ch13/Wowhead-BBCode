<?php
namespace wcf\system\bbcode;
use wcf\system\WCF;
use wcf\system\bbcode\AbstractBBCode;
use wcf\util\StringUtil;

/**
 * @package de.r15ch13.wcf.bbcode.wowhead
 * @author Richard Kuhnt
 * @license MIT License (http://r15ch13.mit-license.org/)
 * @category WCF
 * @see http://www.wowhead.com/tooltips
 */
class WowheadBBCode extends AbstractBBCode
{
    /**
     * @see wcf\system\bbcode\IBBCode::getParsedTag()
     */
    public function getParsedTag(array $openingTag, $content, array $closingTag, BBCodeParser $parser)
    {
        $templateVariables = array(
            'url' => $content,
            'related' => '',
            'language' => 'www',
            'type' => '',
            'id' => 0,
        );

        if(preg_match('/^https?:\/\/(.+?)?\.?(?:wowhead|thottbot|hearthhead)\.com(?:\:\d+)?\/\??(item|quest|spell|achievement|transmog-set|statistic|npc|object|petability|hearthstone\/card|card|hsachievement|cardback|deck|mechanic)=([0-9]+)(?:.*)$/', $content, $matches))
        {
            if(count($matches) >= 4)
            {
                $templateVariables['url'] = $matches[0];
                $templateVariables['language'] = $matches[1];
                $templateVariables['type'] = $matches[2];
                $templateVariables['id'] = $matches[3];
            }
        }

        // Related advanced usage
        // @see http://www.wowhead.com/tooltips#related-advanced-usage
        if(isset($openingTag['attributes'][0]))
        {
            $templateVariables['related'] = trim($openingTag['attributes'][0]);
        }

        WCF::getTPL()->assign($templateVariables);

        return WCF::getTPL()->fetch('wowheadBBCode');
    }
}