<?php

/**
 * Dev. Vinícius B. Sarmento - SEVENSI
 * Adicionar o campo Telefone no formulário WC (Editar minha conta)
 */

add_action( 'woocommerce_edit_account_form', 'my_woocommerce_edit_account_form' );

function my_woocommerce_edit_account_form() {

	$user_id = get_current_user_id();
	$user = get_userdata( $user_id );

	if ( !$user )
		return;

	$telefone = get_user_meta( $user_id, 'telefone', true );

?>
	<fieldset>
		<p class="form-row form-row-thirds">
			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" value="<?php echo esc_attr( $telefone ); ?>" class="input-text" />
			<br />
			<span style="font-size: 12px;">(Telefone format: (XX) XXXXX-XXXX. eg: (55) 55555-5555)</span>
		</p>
	</fieldset>

<?php
 
} // fim da função


/**
 * Salvando no banco de dados
 * hook: woocommerce_save_account_details
 */

add_action( 'woocommerce_save_account_details', 'my_woocommerce_save_account_details' );

function my_woocommerce_save_account_details( $user_id ) {
	update_user_meta( $user_id, 'telefone', htmlentities( $_POST[ 'telefone' ] ) ); 
} // fim da função
