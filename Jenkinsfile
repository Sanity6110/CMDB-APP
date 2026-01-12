pipeline {
    agent {label 'agent'}
    stages{
        stage('Init'){
            steps{
                sh '''
                docker network create MYsql || true
                docker rm -f python-app
                docker rm -f phpadmin
                docker rmi -f python-app
                docker rmi -f phpadmin
                '''
            }
        }
        stage('Build'){
            steps {
                sh 'docker build -t python-app -f Dockerfile.python .'
            }
        }
        stage('Deploy Containers'){
            steps {
                sh 'docker run -d --network MYsql --name python-app python-app:latest'
                sh 'docker run -d -p 80:80 --network MYsql --name phpadmin -e PMA_HOST=mysql -e PMA_PORT=3306 phpmyadmin/phpmyadmin '
            }
        }
    }
}