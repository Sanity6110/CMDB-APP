pipeline {
    agent {label 'agent'}
    stages{
        stage('Init'){
            steps{
                sh '''
                docker network create MYsql || true
                docker rm -f python-app || true
                docker rm -f mysql || true
                docker rm -f phpadmin || true
                docker rmi -f python-app || true
                docker rmi -f phpadmin || true
                docker rmi -f mysql || true
                '''
            }
        }
        stage('Build Image!'){
            steps {
                sh 'docker build -t python-app -f Dockerfile.python .'
            }
        }
        stage('Deploy MySQL Container'){
            steps {
                sh 'docker run --name mysql --network MYsql -e MYSQL_ROOT_PASSWORD=WjhQN70VBMSvmdrVkZl0@ -d mysql:8.3 --default-authentication-plugin=mysql_native_password'
            }
        }
        stage('Deploy Python Container'){
            steps{
                sh 'docker run -d --network MYsql --name python-app python-app:latest'
            }
        }
        stage('Deploy phpMyAdmin Container'){
            steps{
                sh 'docker run -d -p 80:80 --network MYsql --name phpadmin -e PMA_HOST=mysql -e PMA_PORT=3306 phpmyadmin/phpmyadmin '
            }
        }
    }
}