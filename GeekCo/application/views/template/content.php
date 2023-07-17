<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <?php $this->load->view('header'); ?>
    <?php echo $contents; ?>
    <?php $this->load->view('foot'); ?>
</body>
</html>
