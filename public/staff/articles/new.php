<?php
//articles
require_once('../../../private/initialize.php');
//require_login() ;

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['article'];
  $article = new Articles($args);
  $result = $article->save();

  if($result === true) {
    $new_id = $article->id;
    $_SESSION['message'] = 'Article succesfully added';
    redirect_to(url_for('/staff/articles/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $article = new Articles;
}

?>

<?php $page_title = 'Add article'; ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/articles/index.php'); ?>">&laquo; Back to list</a>

  <div class="admin new">
    <h1>Add article</h1>

    <form action="<?php echo url_for('/staff/articles/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>
        
        <?php echo display_errors($article->errors); ?>

      <div id="operations">
        <input type="submit" value="Submit" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
