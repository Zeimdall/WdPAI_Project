<?php

class AppController {

    protected function render(string $filename = null, array $variables = []) {

        $filePath = 'public/views/'. $filename.'.html';
        $output = 'File not found';

        if(file_exists($filePath)){
            extract($variables);

            ob_start();
            include $filePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}
