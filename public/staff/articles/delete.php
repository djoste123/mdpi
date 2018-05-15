<?php

require_once('../../../private/initialize.php');
require_login() ;

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/articles/index.php'));
}
$id = $_GET['id'];
$article = Articles::find_by_id($id);
if($article == false) {
  redirect_to(url_for('/staff/articles/index.php'));
}

if(is_post_request()) {

  // Delete admin
  $result = $article->delete();
  $_SESSION['message'] = 'Article is deleted';
  redirect_to(url_for('/staff/articles/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete article'; ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/articles/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin delete">
    <h1>Delete Article</h1>
    <p>Are you sure that you want to delete article:</p>
    <p class="item"><?php echo h($article->title); ?></p>

    <form action="<?php echo url_for('/staff/articles/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
