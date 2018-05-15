<?php require_once('../../../private/initialize.php'); ?>
<?php //require_login() ; ?>

<?php 
if(!$session->is_logged_in()){
    redirect_to(url_for('/staff/login.php'));
}else{
    //Do nothing
}
?>

<?php $article = Articles::find_all(); ?>
<?php $page_title = 'Articles'; ?>
<?php include(SHARED_PATH . '/public_header2.php'); ?>
<p>&nbsp</p>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="admins listing">
    <h1>Articles</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/articles/new.php'); ?>">Add article</a>
    </div>

  	<table id="evtTarget" class="list">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Abrstract</th>
        <th>Doi</th>
        <th>Date published</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
      <?php foreach($article as $articles) { ?>
        <tr>
          <td><?php echo h($articles->id); ?></td>
          <td><?php echo h($articles->title); ?></td>
          <td><?php echo Articles::ministring(h($articles->abstract)); ?></td>
          <td><?php echo h($articles->doi); ?></td>
          <td><?php echo h($articles->pub_date); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/articles/show.php?id=' . h(u($articles->id))); ?>">Show</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/articles/edit.php?id=' . h(u($articles->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/articles/delete.php?id=' . h(u($articles->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</div>

