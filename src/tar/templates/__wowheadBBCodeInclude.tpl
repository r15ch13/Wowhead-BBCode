<script>
require(['Wowhead/tooltips'], function () {
	window.whTooltips = {
		'colorlinks': true,
		'iconizelinks': true,
		'renamelinks': true,
		'hide': {
			'maxstack': false,
			'droppedby': false,
			'dropchance': false,
			'reagents': false,
			'ilvl': false,
			'extra': false,
			'sellprice': false
		}
	}

	$WowheadPower.init();
});
</script>
