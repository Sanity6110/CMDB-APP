pipeline {
    agent {label 'agent'}
    stages{
        stage('Init'){
            steps{
                sh 'docker rm -f $(docker ps -qa) || true'
            }
        }
        stage('Build'){
            steps {
                sh 'docker build -t python-app Dockerfile.python .'
            }
        }
        stage('Deploy'){
            steps {
                sh 'docker run -d --name python-app python-app:latest'
            }
        }  
    }
}