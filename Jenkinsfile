pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Debug') {
            steps {
                bat '''
                echo CURRENT DIRECTORY:
                cd

                echo FILES:
                dir
                '''
            }
        }

        stage('Deploy') {
            steps {
                bat '''
                echo Deploying...

                robocopy . D:\\Deploy\\test-app /E /NFL /NDL /NJH /NJS /NC /NS

                exit 0
                '''
            }
        }

    }
}
