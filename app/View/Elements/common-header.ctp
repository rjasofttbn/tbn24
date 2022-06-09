<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tbn24.com</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->
    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <!-- Headings -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />  -->
    <!-- Text -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> --> 
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

  

     <?php echo $this->Html->css(
         array(
            'http://fonts.googleapis.com/css?family=Open+Sans:400,700',
            'http://fonts.googleapis.com/css?family=Droid+Sans:400,700',
            'bootstrap/bootstrap.min',
            'bootstrap/bootstrap-responsive.min',
            'supr-theme/jquery.ui.supr',
            'icons',
            '/plugins/misc/qtip/jquery.qtip',
            '/plugins/misc/fullcalendar/fullcalendar',
            '/plugins/misc/search/tipuesearch',
            '/plugins/forms/inputlimiter/jquery.inputlimiter',
            '/plugins/forms/togglebutton/toggle-buttons',
            '/plugins/forms/uniform/uniform.default',
            '/plugins/forms/color-picker/color-picker',
            
            '/plugins/misc/prettify/prettify',
            '/plugins/misc/pnotify/jquery.pnotify.default',
            '/plugins/misc/qtip/jquery.qtip',
            '/plugins/forms/uniform/uniform.default',
            '/plugins/tables/dataTables/jquery.dataTables',
            '/plugins/forms/select/select2',
            '/plugins/forms/validate/validate',
            '/plugins/forms/smartWizzard/smart_wizard',
            'main',
            'custom'
            )
         );
           ?>
   
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $this->webroot; ?>/images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->webroot; ?>/images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->webroot; ?>/images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->webroot; ?>/images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo $this->webroot; ?>/images/apple-touch-icon-57-precomposed.png" />
    
    <script type="text/javascript">
        //adding load class to body and hide page
        document.documentElement.className += 'loadstate';
    </script>

    </head>