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
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * @author Richard 'r15ch13' Kuhnt <r15ch13@gmail.com>
 * @copyright Copyright (c) 2012, Richard 'r15ch13' Kuhnt
 * @license http://www.gnu.org/licenses/lgpl-3.0 GNU Lesser General Public License
 * @link http://r15ch13.de
 */
class WowheadListener implements EventListener
{

    /**
     * @see EventListener::execute()
     */
    public function execute($eventObj, $className, $eventName)
    {
        WCF::getTPL()->append('userMessages', '<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script><script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>');
    }
}
