<?php
/**
 * Admin Theme Options Page (Sharestan Options)
 *
 * @package Sharestan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Theme Options Page
 */
function sharestan_add_options_page() {
	add_menu_page(
		'تنظیمات شارستان',
		'تنظیمات شارستان',
		'manage_options',
		'sharestan-options',
		'sharestan_options_page_html',
		'dashicons-store',
		59
	);
}
add_action( 'admin_menu', 'sharestan_add_options_page' );

/**
 * Register Settings
 */
function sharestan_register_settings() {
	register_setting( 'sharestan_options_group', 'sharestan_primary_color' );
	register_setting( 'sharestan_options_group', 'sharestan_phone_number' );
	register_setting( 'sharestan_options_group', 'sharestan_footer_about' );
	register_setting( 'sharestan_options_group', 'sharestan_enable_hero' );
	register_setting( 'sharestan_options_group', 'sharestan_enable_discount_slider' );
	register_setting( 'sharestan_options_group', 'sharestan_enable_featured_grid' );
}
add_action( 'admin_init', 'sharestan_register_settings' );

/**
 * Theme Options Page HTML
 */
function sharestan_options_page_html() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_GET['settings-updated'] ) ) {
		add_settings_error( 'sharestan_messages', 'sharestan_message', 'تنظیمات با موفقیت ذخیره شد.', 'updated' );
	}

	settings_errors( 'sharestan_messages' );
	?>
	<div class="wrap sharestan-admin-wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post" class="sharestan-admin-form">
			<?php
			settings_fields( 'sharestan_options_group' );
			do_settings_sections( 'sharestan_options_group' );
			?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">رنگ اصلی قالب</th>
					<td>
						<input type="color" name="sharestan_primary_color" value="<?php echo esc_attr( get_option( 'sharestan_primary_color', '#2563eb' ) ); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">شماره تماس پشتیبانی</th>
					<td>
						<input type="text" name="sharestan_phone_number" value="<?php echo esc_attr( get_option( 'sharestan_phone_number', '۰۲۱-۱۲۳۴۵۶۷۸' ) ); ?>" class="regular-text" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">متن درباره ما فوتر</th>
					<td>
						<textarea name="sharestan_footer_about" rows="4" class="large-text"><?php echo esc_textarea( get_option( 'sharestan_footer_about', 'فروشگاه اینترنتی شارستان، بهترین کیفیت و مناسب‌ترین قیمت.' ) ); ?></textarea>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">نمایش اسلایدر هیرو</th>
					<td>
						<input type="checkbox" name="sharestan_enable_hero" value="1" <?php checked( 1, get_option( 'sharestan_enable_hero', 1 ) ); ?> />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">نمایش اسلایدر تخفیف ویژه</th>
					<td>
						<input type="checkbox" name="sharestan_enable_discount_slider" value="1" <?php checked( 1, get_option( 'sharestan_enable_discount_slider', 1 ) ); ?> />
					</td>
				</tr>
			</table>
			<?php submit_button( 'ذخیره تغییرات' ); ?>
		</form>
	</div>
	<?php
}
