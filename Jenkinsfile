stage('Debug') {
    steps {
        sh '''
        echo CURRENT DIRECTORY:
        pwd

        echo FILES:
        ls -la
        '''
    }
}

stage('Deploy') {
    steps {
        sh '''
        echo Deploying...

        mkdir -p /var/jenkins_home/deploy/test-app

        cp -r * /var/jenkins_home/deploy/test-app/
        '''
    }
}
