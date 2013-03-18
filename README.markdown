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
    [wow=lvl=76]http://de.wowhead.com/item=28288[/wow]
    [wow=gems=23121&ench=2647&pcs=25695:25696:25697]http://www.wowhead.com/item=25697[/wow]

It seams there is a bug in Wowheads power.js. If you add an item with gems/enchantments or whatsoever the script breaks and only items before the broken item will be displayed correctly. Avoid using gems/enchantments etc. until Wowhead fixes this problem.

License
----------
Copyright 2013 Richard 'r15ch13' Kuhnt

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License
along with this program. If not, see <http://www.gnu.org/licenses/lgpl-3.0>.
