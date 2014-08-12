<?php if (isset($api_key)): ?>
<script>var ChatBlend = ChatBlend || {};ChatBlend.access_token = "<?php echo $api_key; ?>"</script>
<?php endif; ?>
<script src="https://app.chatblend.com/client.js"></script>
