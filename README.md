# Wowhead BBCode
BBCode to show item- and spelldata from Wowhead.com. Only for [WCF](http://www.woltlab.com/) and [WBB](http://www.woltlab.com/).

## Usage
Use my [Buildscript](https://github.com/r15ch13/WCF-WBB-Package-Builder) to generate the installable package.

Copy a Wowhead.com item/spell/archievement/... link into your text to display the tooltip.

Use [advanced parameters](http://www.wowhead.com/tooltips#related-advanced-usage) to adjust the presentation.

The tooltip works with all languages supported by Wowhead:

    http://www.wowhead.com/item=28288 = Displays an english tooltip
    http://de.wowhead.com/item=28288 = Displays an german tooltip
    http://fr.wowhead.com/item=28288 = Displays an french tooltip

Example:

    [wow]http://www.wowhead.com/item=112920/korvens-crimson-crescent[/wow]
    [wow=bonus=450&lvl=52&spec=263]http://www.wowhead.com/item=112920[/wow]
    [wow]http://www.wowhead.com/item=112920/korvens-crimson-crescent&bonus=450&lvl=53&spec=263[/wow]

    [wow]http://www.wowhead.com/item=28288[/wow]
    [wow]http://wod.wowhead.com/spell=49998[/wow]
    [wow=gems=23121&ench=2647&pcs=25695:25696:25697]http://www.wowhead.com/item=25697[/wow]
    [wow=upgd=4]http://www.wowhead.com/item=105547[/wow]
    [wow=upgd=4]http://de.wowhead.com/item=105547[/wow]
    [wow]http://thottbot.com/item=25697[/wow]
    [wow]http://www.hearthhead.com/card=546/shield-slam[/wow]

## Change tooltip settings
Create a copy of the `__wowheadBBCodeInclude.tpl` template and change the values as you like.
Don't forget to select the template group in your style!

## Build package
```
> composer install
> ./vendor/bin/phing build
```

## License
[The MIT License (MIT)](https://r15ch13.mit-license.org/)