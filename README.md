Wowhead BBCode
=========================
* BBCode to show item- and spelldata from Wowhead.com. Only for [WCF](http://www.woltlab.com/de/) and [WBB](http://www.woltlab.com/de/).

Usage
------------------
Use my [Buildscript](https://github.com/r15ch13/WCF-WBB-Package-Builder) to generate the installable package.

Copy the link to an item of Wowhead.com and add it to your forum to make the tooltip show up.

Use the [advanced parameters](http://www.wowhead.com/tooltips#related-advanced-usage) to adjust the presentation.

The tooltip adapts to the language of the copied links:

    http://www.wowhead.com/item=28288 = Displays an english tooltip
    http://de.wowhead.com/item=28288 = Displays an german tooltip
    http://fr.wowhead.com/item=28288 = Displays an french tooltip

Example:

    [wow]http://www.wowhead.com/item=28288[/wow]
    [wow]http://wod.wowhead.com/spell=49998[/wow]
    [wow=gems=23121&ench=2647&pcs=25695:25696:25697]http://www.wowhead.com/item=25697[/wow]
    [wow=upgd=4]http://www.wowhead.com/item=105547[/wow]
    [wow=upgd=4]http://de.wowhead.com/item=105547[/wow]
    [wow]http://thottbot.com/item=25697[/wow]
    [wow]http://www.hearthhead.com/card=546/shield-slam[/wow]

It seams there is a bug in Wowheads power.js. If you add an item with gems/enchantments or whatsoever the script breaks and only items before the broken item will be displayed correctly. Avoid using gems/enchantments etc. until Wowhead fixes this problem.

License
-------
[The MIT License (MIT)](http://r15ch13.mit-license.org/)