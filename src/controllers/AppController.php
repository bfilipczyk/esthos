<?php

class AppController {
    protected function render(string $template=null, array $variable = []) {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';

        if(file_exists($templatePath)) {
            extract($variable);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
    }
}