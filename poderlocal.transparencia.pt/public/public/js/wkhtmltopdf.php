<?php
    try {
        $wkhtmltopdf = new Wkhtmltopdf(array('path' => APPLICATION_PATH . '/../public/uploads/'));
        $wkhtmltopdf->setTitle("Title");
        $wkhtmltopdf->setHtml("Content");
        $wkhtmltopdf->output(Wkhtmltopdf::MODE_DOWNLOAD, "file.pdf");
    } catch (Exception $e) {
        echo $e->getMessage();
    }