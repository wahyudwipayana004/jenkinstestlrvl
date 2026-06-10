pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

     stage('Check Docker') {
    steps {
        sh '''
        docker version
        '''
    }
}

        stage('Deploy') {
            steps {
                sh '''
                mkdir -p /var/jenkins_home/deploy/test-app
                cp -r * /var/jenkins_home/deploy/test-app/
                '''
            }
        }

    }
}
