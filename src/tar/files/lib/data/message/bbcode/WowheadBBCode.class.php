<?php
/*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU Lesser General Public License for more details.
*
* You should have received a copy of the GNU Lesser General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/lgpl-3.0>.
*/
require_once(WCF_DIR.'lib/data/message/bbcode/BBCodeParser.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/BBCode.class.php');

/**
 * @author Richard 'r15ch13' Kuhnt <r15ch13@gmail.com>
 * @copyright Copyright (c) 2012, Richard 'r15ch13' Kuhnt
 * @license http://www.gnu.org/licenses/lgpl-3.0 GNU Lesser General Public License
 * @link http://r15ch13.de
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
			if(preg_match('/^https?:\/\/(.+?)?\.?(?:wowhead|thottbot)\.com(?:\:\d+)?\/\??(item|quest|spell|achievement|transmog-set|statistic|npc|object|petability)=([0-9]+)$/', StringUtil::encodeHtml($content), $data))
			{
				// nur wenn es vier oder mehr Ergebnisse gibt
				if(count($data) >= 4)
				{
					// Daten zur besseren Lesbarkeit in Variablen speichern
					$url = $data[0];
					$lang = $data[1];
					$type = $data[2];
					$item = $data[3];

					$name = $type ." #". $item;
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
