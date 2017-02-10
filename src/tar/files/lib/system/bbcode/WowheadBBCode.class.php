<?php
namespace wcf\system\bbcode;

use wcf\system\bbcode\AbstractBBCode;
use wcf\system\WCF;
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
    if (!isset($openingTag['attributes'][0])) {
      return '';
    } else if ($parser->getOutputType() == 'text/simplified-html') {
      return $openingTag['attributes'][0];
    }

    $url = StringUtil::trim($openingTag['attributes'][0]);
    // power.js no longer matches thottbot.com urls
    $url = str_replace('thottbot.com', 'wowhead.com', $url);

    $templateVariables = array(
      'id' => 0,
      'url' => $url,
      'rel' => '',
      'slug' => '',
      'type' => '',
      'lang' => 'www',
      'content' => '',
    );

    // returns named capture groups lang, type, id, slug and rel
    if (preg_match('/^(?:https?:)?\/\/(?<lang>.+?)?\.?(?:wowhead)\.com(?:\:\d+)?\/\??(?<type>[\w-]+)=(?<id>[0-9\.-]+)\/?(?<slug>[\w\d\-]+|)?&?(?<rel>[\w\d\-=:&]+|)?$/', $url, $matches)) {
      $templateVariables = array_merge($templateVariables, $matches);

      // show "<slug>" or "<type> #<id>" as content
      $templateVariables['content'] = StringUtil::wordsToUpperCase(str_replace('-', ' ', $matches['slug']));
      if (empty($matches['slug'])) {
        $templateVariables['content'] = StringUtil::wordsToUpperCase($matches['type']) . ' #' . $matches['id'];
      }
    } else {
      return $openingTag['attributes'][0];
    }

    // strip numeric keys
    foreach ($templateVariables as $key => $value) {
      if (is_int($key)) {
        unset($templateVariables[$key]);
      }
    }

    // related advanced usage
    // @see http://www.wowhead.com/tooltips#related-advanced-usage
    if (isset($openingTag['attributes'][1])) {
      $templateVariables['rel'] = trim($openingTag['attributes'][1]);
    }

    WCF::getTPL()->assign($templateVariables);

    return WCF::getTPL()->fetch('wowheadBBCode');
  }
}
