<?php require ROUT_APP.'/views/inc/header.php'; ?>
<pre>
  <?php
      print_r($data['titulo']);
      echo ROUT_APP;
   ?>
</pre>
<!--
<ul>
  <?php foreach ($data['articulos'] as $articulo) : ?>
    <li><?php echo $articulo->NOMBRE_ADMIN; ?></li>
  <?php endforeach; ?>
</ul>-->
<?php require ROUT_APP.'/views/inc/footer.php'; ?>
