pipeline {
    agent {label 'agent'}
    stages{
        stage('Create MySQL DB and data'){
            steps{
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