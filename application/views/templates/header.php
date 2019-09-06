<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="alternate" hreflang="fr" href="<?= site_url()?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript">
        var base_url = '<?= site_url()?>';
    </script>
    <?php
    if(isset($title)){
      echo '<title>'.$title.'</title>';
    }
    if(isset($csss)){
      foreach($csss as $css){
        link_tag($css);
      }
    }
    ?>
</head>
<body class="<?= $_id?>">
