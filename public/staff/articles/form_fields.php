<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($article)) {
  redirect_to(url_for('/staff/articles/index.php'));
}
?>
<?php require_once('../../../private/shared/JQ_header.php'); ?>
<dl>
  <dt>Title</dt>
  <dd><textarea name="article[title]" rows="4" cols="60"><?php echo h($article->title); ?></textarea></dd>
</dl>

<dl>
  <dt>Abstract</dt>
  <dd><textarea name="article[abstract]" rows="6" cols="60"><?php echo h($article->title); ?></textarea></dd>
</dl>

<dl>
  <dt>DOI</dt>
  <dd><input type="text" name="article[doi]" value="<?php echo h($article->doi); ?>" /></dd>
</dl>

<dl>
  <dt>Date published</dt>
  <dd><input type="text" id="datepicker" name="article[pub_date]" value="<?php echo h($article->pub_date); ?>" /></dd>
</dl>

