<?php echo $this->extend('frontend/layouts/main'); ?>


<?php echo $this->section('article'); ?>
  <article>
    <h1><?php echo lang('Home.post.title'); ?>: <?php echo $baslik; ?></h1>
    <div>
      <p><?php echo $icerik; ?></p>
      <p>&mdash; <?php echo lang('Home.author'); ?>: <?php echo $yazar; ?></p>
      <p>&mdash; <?php echo lang('Home.time'); ?>: <?php echo $zaman; ?></p>
    </div>
  </article>
<?php echo $this->endSection(); ?>


<?php echo $this->section('style'); ?>
  <style>
    body { text-align: center; padding: 150px; }
    h1 { font-size: 50px; }
    body { font: 20px Helvetica, sans-serif; color: #333; }
    article { display: block; text-align: left; width: 650px; margin: 0 auto; }
    a { color: #dc8100; text-decoration: none; }
    a:hover { color: #333; text-decoration: none; }
  </style>
<?php echo $this->endSection(); ?>

<?php echo $this->section('contact'); ?>
  <h1><?php echo lang('Home.contact'); ?></h1>
  <p>Merhaba bana youtube ve linkedin üzerinden ulaşabilirsiniz.</p>
<?php echo $this->endSection(); ?>

<?php echo $this->section('about'); ?>
  <h1><?php echo lang('Home.about'); ?></h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<?php echo $this->endSection(); ?>