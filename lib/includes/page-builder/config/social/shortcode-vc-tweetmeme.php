<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

return array(
	'name' => __( 'Tweetmeme Button', 'page_builder' ),
	'base' => 'vc_tweetmeme',
	'icon' => 'icon-wpb-tweetme',
	'category' => __( 'Social', 'page_builder' ),
	'description' => __( 'Tweet button', 'page_builder' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'param_name' => 'type',
			'heading' => __( 'Choose a button', 'page_builder' ),
			'value' => array(
				__( 'Share a link', 'page_builder' ) => 'share',
				__( 'Follow', 'page_builder' ) => 'follow',
				__( 'Hashtag', 'page_builder' ) => 'hashtag',
				__( 'Mention', 'page_builder' ) => 'mention',
			),
			'description' => __( 'Select type of Twitter button.', 'page_builder' ),
		),

		//share type
		array(
			'type' => 'checkbox',
			'heading' => __( 'Share url: page URL', 'page_builder' ),
			'param_name' => 'share_use_page_url',
			'value' => array(
				__( 'Yes', 'page_builder' ) => 'page_url',
			),
			'std' => 'page_url',
			'dependency' => array(
				'element' => 'type',
				'value' => 'share',
			),
			'description' => __( 'Use the current page url to share?', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Share url: custom URL', 'page_builder' ),
			'param_name' => 'share_use_custom_url',
			'value' => '',
			'dependency' => array(
				'element' => 'share_use_page_url',
				'value_not_equal_to' => 'page_url',
			),
			'description' => __( 'Enter custom page url which you like to share on twitter?', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Tweet text: page title', 'page_builder' ),
			'param_name' => 'share_text_page_title',
			'value' => array(
				__( 'Yes', 'page_builder' ) => 'page_title',
			),
			'std' => 'page_title',
			'dependency' => array(
				'element' => 'type',
				'value' => 'share',
			),
			'description' => __( 'Use the current page title as tweet text?', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Tweet text: custom text', 'page_builder' ),
			'param_name' => 'share_text_custom_text',
			'value' => '',
			'dependency' => array(
				'element' => 'share_text_page_title',
				'value_not_equal_to' => 'page_title',
			),
			'description' => __( 'Enter the text to be used as a tweet?', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Via @', 'page_builder' ),
			'param_name' => 'share_via',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'share',
			),
			'description' => __( 'Enter your Twitter username.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Recommend @', 'page_builder' ),
			'param_name' => 'share_recommend',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'share',
			),
			'description' => __( 'Enter the Twitter username to be recommended.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Hashtag #', 'page_builder' ),
			'param_name' => 'share_hashtag',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'share',
			),
			'description' => __( 'Add a comma-separated list of hashtags to a Tweet using the hashtags parameter.', 'page_builder' ),
		),

		//follow type
		array(
			'type' => 'textfield',
			'heading' => __( 'User @', 'page_builder' ),
			'param_name' => 'follow_user',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'follow',
			),
			'description' => __( 'Enter username to follow.', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Show username', 'page_builder' ),
			'param_name' => 'follow_show_username',
			'value' => array(
				__( 'Yes', 'page_builder' ) => 'yes',
			),
			'std' => 'yes',
			'dependency' => array(
				'element' => 'type',
				'value' => 'follow',
			),
			'description' => __( 'Do you want to show username in button?', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Show followers count', 'page_builder' ),
			'param_name' => 'show_followers_count',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'follow',
			),
			'description' => __( 'Do you want to displat the follower count in button?', 'page_builder' ),
		),
		//hashtag type
		array(
			'type' => 'textfield',
			'heading' => __( 'Hashtag #', 'page_builder' ),
			'param_name' => 'hashtag_hash',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'hashtag',
			),
			'description' => __( 'Add hashtag to a Tweet using the hashtags parameter', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Tweet text: No default text', 'page_builder' ),
			'param_name' => 'hashtag_no_default',
			'value' => array(
				__( 'Yes', 'page_builder' ) => 'yes',
			),
			'std' => 'yes',
			'dependency' => array(
				'element' => 'type',
				'value' => 'hashtag',
			),
			'description' => __( 'Set no default text for tweet?', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Tweet text: custom', 'page_builder' ),
			'param_name' => 'hashtag_custom_tweet_text',
			'value' => '',
			'dependency' => array(
				'element' => 'hashtag_no_default',
				'value_not_equal_to' => 'yes',
			),
			'description' => __( 'Set custom text for tweet.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Recommend @', 'page_builder' ),
			'param_name' => 'hashtag_recommend_1',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'hashtag',
			),
			'description' => __( 'Enter username to be recommended.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Recommend @', 'page_builder' ),
			'param_name' => 'hashtag_recommend_2',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'hashtag',
			),
			'description' => __( 'Enter username to be recommended.', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Tweet url: No URL', 'page_builder' ),
			'param_name' => 'hashtag_no_url',
			'value' => array(
				__( 'Yes', 'page_builder' ) => 'yes',
			),
			'std' => 'yes',
			'dependency' => array(
				'element' => 'type',
				'value' => 'hashtag',
			),
			'description' => __( 'Do you want to set no url to be tweeted?', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Tweet url: custom', 'page_builder' ),
			'param_name' => 'hashtag_custom_tweet_url',
			'value' => '',
			'dependency' => array(
				'element' => 'hashtag_no_url',
				'value_not_equal_to' => 'yes',
			),
			'description' => __( 'Enter custom url to be used in the tweet.', 'page_builder' ),
		),
		//mention type
		array(
			'type' => 'textfield',
			'heading' => __( 'Tweet to @', 'page_builder' ),
			'param_name' => 'mention_tweet_to',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'mention',
			),
			'description' => __( 'Enter username where you want to send your tweet.', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Tweet text: No default text', 'page_builder' ),
			'param_name' => 'mention_no_default',
			'value' => array(
				__( 'Yes', 'page_builder' ) => 'yes',
			),
			'std' => 'yes',
			'dependency' => array(
				'element' => 'type',
				'value' => 'mention',
			),
			'description' => __( 'Set no default text of the tweet?', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Tweet text: custom', 'page_builder' ),
			'param_name' => 'mention_custom_tweet_text',
			'value' => '',
			'dependency' => array(
				'element' => 'mention_no_default',
				'value_not_equal_to' => 'yes',
			),
			'description' => __( 'Enter custom text for the tweet.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Recommend @', 'page_builder' ),
			'param_name' => 'mention_recommend_1',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'mention',
			),
			'description' => __( 'Enter username to recommend.', 'page_builder' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Recommend @', 'page_builder' ),
			'param_name' => 'mention_recommend_2',
			'value' => '',
			'dependency' => array(
				'element' => 'type',
				'value' => 'mention',
			),
			'description' => __( 'Enter username to recommend.', 'page_builder' ),
		),
		// general
		array(
			'type' => 'checkbox',
			'heading' => __( 'Use large button', 'page_builder' ),
			'param_name' => 'large_button',
			'value' => '',
			'description' => __( 'Do you like to display a larger Tweet button?', 'page_builder' ),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Opt-out of tailoring Twitter', 'page_builder' ),
			'param_name' => 'disable_tailoring',
			'value' => '',
			'description' => __( 'Tailored suggestions make building a great timeline. Would you like to disable this feature?', 'page_builder' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Language', 'page_builder' ),
			'param_name' => 'lang',
			'value' => array(
				'Automatic' => '',
				'French - français' => 'fr',
				'English' => 'en',
				'Arabic - العربية' => 'ar',
				'Japanese - 日本語' => 'ja',
				'Spanish - Español' => 'es',
				'German - Deutsch' => 'de',
				'Italian - Italiano' => 'it',
				'Indonesian - Bahasa Indonesia' => 'id',
				'Portuguese - Português' => 'pt',
				'Korean - 한국어' => 'ko',
				'Turkish - Türkçe' => 'tr',
				'Russian - Русский' => 'ru',
				'Dutch - Nederlands' => 'nl',
				'Filipino - Filipino' => 'fil',
				'Malay - Bahasa Melayu' => 'msa',
				'Traditional Chinese - 繁體中文' => 'zh-tw',
				'Simplified Chinese - 简体中文' => 'zh-cn',
				'Hindi - हिन्दी' => 'hi',
				'Norwegian - Norsk' => 'no',
				'Swedish - Svenska' => 'sv',
				'Finnish - Suomi' => 'fi',
				'Danish - Dansk' => 'da',
				'Polish - Polski' => 'pl',
				'Hungarian - Magyar' => 'hu',
				'Farsi - فارسی' => 'fa',
				'Hebrew - עִבְרִית' => 'he',
				'Urdu - اردو' => 'ur',
				'Thai - ภาษาไทย' => 'th',
			),
			'description' => __( 'Select button display language or allow it to be automatically defined by user preferences.', 'page_builder' ),
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'el_id',
			'heading' => __( 'Element ID', 'page_builder' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter element ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'page_builder' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'page_builder' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'page_builder' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'page_builder' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'page_builder' ),
		),
	),
);
