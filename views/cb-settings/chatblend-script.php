<?php if (isset($api_key) && strlen($api_key) > 0): ?>
<script>var ChatBlend = ChatBlend || {};ChatBlend.access_token = "<?php echo $api_key; ?>"</script>
<?php else: ?>
<script type="text/javascript">
	console.log('ChatBlend Live Chat has been installed but requires an valid API Key to use. Please visit ChatBlend Settings Page to configure or visit https://www.chatblend.com/ to sign up.');	
</script>
<?php endif; ?>
<script src="https://app.chatblend.com/client.js"></script>

