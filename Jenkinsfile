pipeline {
    agent {label 'agent'}
    stages{
        stage('Init'){
            steps{
                sh 'echo hello'
                //sh 'docker rm -f $(docker ps -qa) || true'
            }
        }
        stage('Build'){
            steps {
                sh 'docker build -t python-app -f Dockerfile.python .'
            }
        }
        stage('Deploy'){
            steps {
                sh 'docker run -d --name python-app python-app:latest'
            }
        }  
    }
}