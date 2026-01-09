pipeline {
    agent any //{label 'agent'}
    stages{
        stage('Init'){
            steps{
                sh 'sudo -S apt update %% sudo -S apt upgrade -y || true'
                sh 'sudo -S apt install python2 docker || true'
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