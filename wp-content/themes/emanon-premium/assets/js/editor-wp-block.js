/**
 * File editor-wp-block.js.
 *
 * Block editor Customizer enhancements for a better user experience.
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * 見出しスタイル
 */
(function () {

	wp.blocks.registerBlockStyle( 'core/heading', {
		name: 'default',
		label: 'デフォルト',
		isDefault: true,
	});

	wp.blocks.registerBlockStyle( 'core/heading', {
		name: 'none',
		label: '装飾なし',
		isDefault: false,
	});

})();


/**
 * プルクオートスタイル
 */
(function () {

	wp.blocks.registerBlockStyle( 'core/pullquote', {
		name: 'solid-color',
		label: '単色',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/pullquote', {
		name: 'speech-bubble',
		label: '吹き出し',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/pullquote', {
		name: 'speech-bubble-center',
		label: '吹き出し［テキスト中央］',
		isDefault: false,
	});

})();

/**
 * 文章スタイル
 */
(function () {

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__speech-bubble',
		label: '吹き出し',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__checkmark',
		label: 'チェック',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__circle',
		label: '○',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__cross',
		label: '×',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__alert',
		label: '！',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__question',
		label: '？',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__notice',
		label: 'お知らせ',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__point',
		label: 'ポイント',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__memo',
		label: 'メモ',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__bubble',
		label: 'コメント',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__crown',
		label: 'クラウン',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__star',
		label: '星',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'paragraph__download',
		label: 'ダウンロード',
		isDefault: false,
	});

})();

/**
 * リストスタイル
 */
(function () {

	wp.blocks.registerBlockStyle( 'core/list', {
		name: 'item__checkmark',
		label: 'チェック［A］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/list', {
		name: 'item__checkmark--square',
		label: 'チェック［B］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/list', {
		name: 'item__arrow',
		label: '矢印［A］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/list', {
		name: 'item__arrow--circle',
		label: '矢印［B］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/list', {
		name: 'item__notes',
		label: '注釈',
		isDefault: false,
	});

})();

/**
 * 画像スタイル
 */
(function () {
	wp.blocks.registerBlockStyle( 'core/image', {
		name: 'image__shadow',
		label: '影付き',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/image', {
		name: 'image__border',
		label: '枠付き',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/image', {
		name: 'image__border--rounded',
		label: '枠付き［角丸］',
		isDefault: false,
	});
	
})();

/**
 * 表スタイル
 */
(function () {
	wp.blocks.registerBlockStyle( 'core/table', {
		name: 'table__side',
		label: '背景色［表側］',
		isDefault: false,
	});

})();

/**
 * グループスタイル
 */
(function () {
	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group__border',
		label: 'ボーダー［A］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group__border_dark',
		label: 'ボーダー［B］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group-center__circle',
		label: '○［中央］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group-left__circle',
		label: '○［左］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group-center__cross',
		label: '×［中央］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group-left__cross',
		label: '×［左］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group-center__alert',
		label: '！［中央］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group-left__alert',
		label: '！［左］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group-center__checkmark',
		label: 'チェック［中央］',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'group-left__checkmark',
		label: 'チェック［左］',
		isDefault: false,
	});

})();


/**
 * 区切りスタイル
 */
(function () {
	wp.blocks.registerBlockStyle( 'core/spacer', {
		name: 'default',
		label: 'デフォルト',
		isDefault: true,
	});

	wp.blocks.registerBlockStyle( 'core/spacer', {
		name: 'display-pc',
		label: 'PC',
		isDefault: false,
	});

	wp.blocks.registerBlockStyle( 'core/spacer', {
		name: 'display-sp',
		label: 'SP',
		isDefault: false,
	});

})();
