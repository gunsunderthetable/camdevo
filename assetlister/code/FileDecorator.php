<?php

    class FileDecorator extends DataExtension {

        function getCSSClass()
        {
                return strtolower($this->owner->getExtension());
        }

        static $supportedFiles = array(
                "pdf", "ppt", "pptx", "docx", "doc", "xls", "xlsx", "png", "gif", "jpeg", "jpg", "csv"
        );

        function IsSupportedFile()
        {
                if(in_array($this->getCSSClass(), self::$supportedFiles)) return true;
                return false;
        }

    }
