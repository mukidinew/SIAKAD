<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset ($site_title)?$site_title.' | '.$this->config->item('site_title'):$this->config->item('site_title'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="<?php echo $this->config->item('meta_desc');?>" name="description" />
    <meta content="<?php echo $this->config->item('meta_key');?>" name="keywords" />
    <meta content="<?php echo $this->config->item('meta_author');?>" name="author" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-switch.min.css?v=3.3.2" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/ladda-themeless.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/dropdowns-enhancement.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/select2-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet">
    <link rel="shortcut icon" href="wsclient.ico" title="Favicon" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
        if ($assign_css != '') {
            $this->load->view($assign_css);
        }
    ?>
  </head>
  <body>
    <div class="container-fluid ws-container">
        <?php echo $view; ?>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>var top_url = '<?php echo base_url();?>'; </script>
    <script src="<?php echo base_url();?>assets/js/jquery.js?v=2.1.3"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js?v=3.3.4"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js?v=3.3.2"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.full.min.js?v=3.5.4"></script>
    <script src="<?php echo base_url(); ?>assets/js/spin.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ladda.min.js?v=0.9.4"></script>
    <script src="<?php echo base_url(); ?>assets/js/dropdowns-enhancement.js?v=3.1.1"></script>
    <script src="<?php echo base_url();?>assets/js/back-to-top.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>assets/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.min.js"></script>
    <?php
        //echo $assign_js;
        if ($assign_js != '') {
            $this->load->view($assign_js);
        }
    ?>
  </body>
</html>
