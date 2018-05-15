<?php require_once('../../../private/initialize.php'); ?>

<?php
//articles show
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$article = Articles::find_by_id($id);

?>

<?php $page_title = 'Article: ' . h($article->id); ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/articles/index.php'); ?>">&laquo; Back to list</a>

  <div class="admin show">

    <h1>Article: <?php echo h($article->id); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Title</dt>
        <dd><?php echo h($article->title); ?></dd>
      </dl>
      <dl>
        <dt>Abstract</dt>
        <dd><?php echo h($article->abstract); ?></dd>
      </dl>
      <dl>
        <dt>DOI</dt>
        <dd><?php echo h($article->doi); ?></dd>
      </dl>
        <dl>
        <dt>Date published</dt>
        <dd><?php echo h($article->pub_date); ?></dd>
      </dl>
    </div>

  </div>

</div>
