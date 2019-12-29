<?php
namespace Deployer;

// https://github.com/deployphp/deployer/blob/master/recipe/laravel.php
require 'recipe/laravel.php';

set('application', 'Wynajmnik.pl');
set('http_user', 'www-data');
set('repository', 'ssh://git@github.com/LQS666/Wynajmnik.git');
set('git_tty', true);

// Laravel writable dirs
set('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'public'
]);

host('77.55.194.25')
    ->user('wynajmnik')
    ->port(22)
    ->set('deploy_path', '/home/wynajmnik/html');

// desc('Override for the original command to skip it');
// task('artisan:cache:clear', function () {
//     writeln('Skipping...');
// });

after('artisan:config:cache', 'artisan:queue:restart');
before('deploy:symlink', 'artisan:migrate');
after('deploy:failed', 'deploy:unlock');

