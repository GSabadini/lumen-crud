node('master') {
    try {
        stage('build') {
            // Checkout the app at the given commit sha from the webhook
            checkout scm

            // Install dependencies, create a new .env file and generate a new key, just for testing
            sh 'docker run --rm --volume $(pwd):/app composer install --no-ansi'
            sh 'cp .env.example .env'
            sh 'docker run --rm --name devapp -v $(pwd):/var/www/app -w /var/www/app ambientum/php:7.2-nginx php artisan key:generate'

            // Run any static asset building, if needed
            // sh "npm install && gulp --production"
        }

        stage('test') {
            // Run any testing suites
            sh 'docker run --rm --name devapp -v $(pwd):/var/www/app -w /var/www/app ambientum/php:7.2-nginx php ./vendor/bin/phpunit'
        }

        stage('deploy') {
            // If we had ansible installed on the server, setup to run an ansible playbook
            // sh 'ansible-playbook -i ./ansible/hosts ./ansible/deploy.yml'
            // sh "echo 'WE ARE DEPLOYING'"
        }
    } catch(error) {
        throw error
    } finally {
        // Any cleanup operations needed, whether we hit an error or not
    }

}