<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php//echo form_open('admin/news/create'); ?>

<form enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/news/create" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>