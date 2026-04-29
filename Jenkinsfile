stage('Deploy') {
    steps {
        bat '''
        echo Deploying...

        xcopy /E /I /Y * C:\\deploy\\test-app
        '''
    }
}
