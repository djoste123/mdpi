<?php
//articles edit
require_once('../../../private/initialize.php');
//require_login() ;

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/articles/index.php'));
}
$id = $_GET['id'];
$article = Articles::find_by_id($id);
if($article == false) {
  redirect_to(url_for('/staff/articles/index.php'));
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['article'];
  $article->merge_attributes($args);
  $result = $article->save();

  if($result === true) {
    $_SESSION['message'] = 'Article is succesfuly edited';
    redirect_to(url_for('/staff/articles/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit article'; ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/articles/index.php'); ?>">&laquo; Back to list</a>

  <div class="admin edit">
    <h1>Edit article</h1>

    <?php echo display_errors($article->errors); ?>

    <form action="<?php echo url_for('/staff/articles/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
