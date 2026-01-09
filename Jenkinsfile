pipeline {
    agent {label 'agent'}
    stages{
        stage('Create MySQL DB and data'){
            steps{
                sh "chmod +x createcmdb.py"
                sh "./createcmdb.py"
            }
        }
        stage('Second Stage'){
            steps {
                sh "pwd"
            }
        }
    }
}