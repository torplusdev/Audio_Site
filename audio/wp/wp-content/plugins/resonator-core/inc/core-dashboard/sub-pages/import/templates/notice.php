<?php if(!ResonatorCoreImport::get_instance()->is_ready_to_import()): ?>
<div class="qodef-cdb-problem">
	<p><?php esc_html_e('Please note that your server resources are not configured properly so you might run into an issue during the demo import process. Please adjust your server configuration values. ', 'resonator-core'); ?></p>
</div>
<?php endif; ?>