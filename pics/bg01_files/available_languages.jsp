










AUI.add(
	'portal-available-languages',
	function(A) {
		var available = {};

		var direction = {};

		

			available['zh_CN'] = '中文 (中国)';
			direction['zh_CN'] = 'ltr';

		

			available['zh_TW'] = '中文 (台湾地区)';
			direction['zh_TW'] = 'ltr';

		

			available['en_US'] = '英文 (美国)';
			direction['en_US'] = 'ltr';

		

		Liferay.Language.available = available;
		Liferay.Language.direction = direction;
	},
	'',
	{
		requires: ['liferay-language']
	}
);