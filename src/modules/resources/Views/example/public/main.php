<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->include(sourceView('example\public\meta_title')) ?>

    <title><?= $title ?></title>

	<?= $this->include(sourceView('example\public\assets_head')) ?>

	<?= $this->renderSection('head_scripts') ?>
</head>
<body>

<header>
	<?= $this->include(sourceView('example\public\menu_header')) ?>
</header>

<?= $this->renderSection('content') ?>

<?= $this->include(sourceView('example\public\menu_footer')) ?>

<?= $this->include(sourceView('example\public\assets_foot')) ?>
<?= $this->renderSection('foot_scripts') ?>

</body>
</html>