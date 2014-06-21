<?php
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

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
