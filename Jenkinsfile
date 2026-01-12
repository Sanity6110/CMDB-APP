pipeline {
    agent any //{label 'agent'}
    stages{
        stage('Init'){
            steps{
                sh 'docker network create MYsql || True'
                sh 'docker rm -f pyton-app'
                sh 'docker rmi -f python-app'
            }
        }
        stage('Build'){
            steps {
                sh 'docker build -t python-app -f Dockerfile.python .'
            }
        }
        stage('Deploy Container'){
            steps {
                sh 'docker run -d -p 3306:3306 --netowork MYsql --name python-app python-app:latest'
            }
        }
        stage('Deploy Webpage'){
            steps{
                sh 'sudo chmod +x phppage.sh || True'
                sh 'sudo ./phppage.sh'
            }
        }
    }
}