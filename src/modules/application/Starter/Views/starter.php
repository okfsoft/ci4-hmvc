<?= $this->extend(sourceView('example\public\main')) ?>

<?= $this->section('head_scripts') ?>
<!-- Page Level Header Script -->
<?= $this->endSection() ?>


<?= $this->section('content') ?>
    <!--MAIN CONTENT -->
    <section>
        <h1>About this hmvc page</h1>
        <p>The page you are viewing is dynamically generated by CodeIgniter.</p>
        <p>If you want to prepare main content, you can find it at:</p>
        <pre><code>modules/Starter/Views/starter.php</code></pre>
        <p>The controller for this page can be found at:</p>
        <pre><code>modules/Starter/Controllers/Starter.php</code></pre>
        <p>Routers for this page can be found at:</p>
        <pre><code>modules/Starter/Config/Routes.php</code></pre>
    </section>
<?= $this->endSection() ?>




<?= $this->section('foot_scripts') ?>
    <!-- Page Level Footer Script -->
    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>
<?= $this->endSection() ?>
