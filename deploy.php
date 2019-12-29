<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Wynajmnik.pl');

// Project repository
set('repository', 'ssh://git@github.com/LQS666/Wynajmnik.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('77.55.194.25')
    ->user('wynajmnik')
    ->port(22)
    ->set('deploy_path', '/home/wynajmnik/html');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

#before('deploy:symlink', 'artisan:migrate');

