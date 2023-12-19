<?php
/**
 * This file defines the plugin's settings page within the admin menu.
 */

class Kissws_Simple_Tweaks_Admin_Menu {

	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'add_menu_page' ) );
	}

	public static function add_menu_page() {
		add_menu_page(
			'KISS WS Simple Tweaks',
			'KISS WS Simple Tweaks',
			'administrator',
			'kissws-simple-tweaks',
			array( __CLASS__, 'render_options_page' )
		);
	}

	public static function render_options_page() {
		?>

		<div class="wrap">

			<h1>KISS WS Simple Tweaks</h1>

			<form method="post">
				<?php wp_nonce_field( 'kissws_simple_tweaks_update_options', 'kissws_simple_tweaks_nonce' ); ?>

				<p>
					<button type="button" id="kissws-simple-tweaks-toggle-all" class="button button-primary">Toggle All</button>
				</p>

				<h3><?php _e( 'General Tweaks', 'kisswssimpletweaks' ); ?></h3>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row">
								<label for="kissws_simple_tweaks_disable_comments">
									<input type="checkbox" id="kissws_simple_tweaks_disable_comments" name="kissws_simple_tweaks_options[disable_comments]" value="1" <?php checked( get_option( 'kissws_simple_tweaks_disable_comments' ), 1 ); ?>>
									<?php _e( 'Disable comments on all posts and pages', 'kisswssimpletweaks' ); ?>
								</label>
							</th>
							<td>
								<p class="description"><?php _e( 'This will remove comment sections from all content, streamlining your site.', 'kisswssimpletweaks' ); ?></p>
							</td>
						</tr>
						</tbody>
				</table>

				<p>
					<input type="submit" name="submit" value="<?php esc_attr_e( 'Save Changes', 'kisswssimpletweaks' ); ?>" class="button button-primary">
				</p>
			</form>

		</div>

		<?php
	}

}