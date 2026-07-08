pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

     stage('Security Scan') {
    steps {
        sh '''
        docker run --rm \
          -v "$PWD":/app \
          -w /app \
          composer:latest \
          composer audit --locked 
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
