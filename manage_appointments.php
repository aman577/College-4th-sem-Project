<?php if (isset($_GET['message']) && !empty($_GET['message'])): ?>
    <script>
        alert("<?php echo htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8'); ?>");
        setTimeout(function() {
            window.location.href = 'admin_panel.php'; 
        });
    </script>
<?php endif; ?>
