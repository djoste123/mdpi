<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'Parse CSV'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">

    <table id="inventory">
      <tr>
        <th>title</th>
        <th>abstact</th>
        <th>doi</th>
        <th>date_published</th>
      </tr>

<?php

$parser = new ParseCSV(PRIVATE_PATH . '/csv_test.csv');
$type_array = $parser->parse();

?>
      <?php foreach($type_array as $args) { ?>
        <?php $type = new Type($args); ?>
      <tr>
        <td><?php echo h($type->title); ?></td>
        <td><?php echo h($type->abstract); ?></td>
        <td><?php echo h($type->doi); ?></td>
        <td><?php echo h($type->date_published); ?></td>
      </tr>
      <?php } ?>

    </table>
  </div>

</div>

